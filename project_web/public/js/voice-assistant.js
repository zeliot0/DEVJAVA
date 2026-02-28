(function () {
    function createWidget() {
        var root = document.createElement('div');
        root.className = 'nexa-voice-widget';
        root.innerHTML = '' +
            '<button class="nexa-voice-toggle" type="button" aria-label="NEXA Assistant">' +
            '  <i class="fa-solid fa-microphone"></i>' +
            '</button>' +
            '<div class="nexa-voice-panel">' +
            '  <div class="nexa-voice-title">NEXA Assistant</div>' +
            '  <div class="nexa-voice-status">Cliquez puis parlez.</div>' +
            '  <button class="nexa-voice-test" type="button">Tester la voix</button>' +
            '  <div class="nexa-voice-text"></div>' +
            '  <div class="nexa-voice-history"></div>' +
            '</div>';
        document.body.appendChild(root);
        return root;
    }

    function speak(text, onEnd) {
        if (!('speechSynthesis' in window)) {
            if (typeof onEnd === 'function') {
                onEnd();
            }
            return;
        }
        window.speechSynthesis.cancel();
        var msg = new SpeechSynthesisUtterance(text);
        msg.lang = 'fr-FR';
        msg.rate = 1;
        msg.onend = function () {
            if (typeof onEnd === 'function') {
                onEnd();
            }
        };
        msg.onerror = function () {
            if (typeof onEnd === 'function') {
                onEnd();
            }
        };
        window.speechSynthesis.speak(msg);
    }

    function localReply(input) {
        var text = (input || '').toLowerCase();
        if (text.indexOf('bonjour') !== -1 || text.indexOf('salut') !== -1) {
            return 'Bonjour, je suis NEXA Assistant. Que voulez-vous faire ?';
        }
        if (text.indexOf('heure') !== -1) {
            var now = new Date();
            return 'Il est ' + now.getHours() + ' heures ' + String(now.getMinutes()).padStart(2, '0') + '.';
        }
        if (text.indexOf('profil') !== -1) {
            window.location.href = '/profile';
            return 'J ouvre votre profil.';
        }
        if (text.indexOf('utilisateur') !== -1 || text.indexOf('admin user') !== -1) {
            window.location.href = '/admin/users';
            return 'J ouvre la liste des utilisateurs.';
        }
        return 'Commande reconnue: ' + input + '. Etape suivante: brancher OpenAI pour des reponses intelligentes.';
    }

    function askBackend(input) {
        return fetch('/api/voice/ask', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message: input })
        }).then(function (response) {
            if (!response.ok) {
                throw new Error('HTTP ' + response.status);
            }
            return response.json();
        }).then(function (json) {
            if (!json || !json.ok || !json.data || !json.data.reply) {
                throw new Error('invalid payload');
            }
            return json.data;
        });
    }

    function init() {
        var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        var widget = createWidget();
        var toggle = widget.querySelector('.nexa-voice-toggle');
        var testButton = widget.querySelector('.nexa-voice-test');
        var panel = widget.querySelector('.nexa-voice-panel');
        var status = widget.querySelector('.nexa-voice-status');
        var transcript = widget.querySelector('.nexa-voice-text');
        var historyBox = widget.querySelector('.nexa-voice-history');
        var defaultStatus = 'Cliquez micro et dites "NEXA + votre demande".';

        function setStatus(message) {
            status.textContent = message;
        }

        function appendHistory(role, text) {
            if (!historyBox || !text) {
                return;
            }
            var line = document.createElement('div');
            line.className = 'nexa-voice-line ' + role;
            line.textContent = (role === 'user' ? 'Vous: ' : 'NEXA: ') + text;
            historyBox.appendChild(line);

            while (historyBox.children.length > 8) {
                historyBox.removeChild(historyBox.firstChild);
            }
            historyBox.scrollTop = historyBox.scrollHeight;
        }

        if (testButton) {
            testButton.addEventListener('click', function () {
                setStatus('Test audio...');
                speak('Test vocal NEXA Assistant. Si vous entendez ce message, la sortie audio fonctionne.');
            });
        }

        if (!SpeechRecognition) {
            setStatus('Reconnaissance vocale non supportee sur ce navigateur.');
            panel.classList.add('open');
            toggle.disabled = true;
            return;
        }

        if (!window.isSecureContext) {
            setStatus('Vocal bloque: ouvrez le site en HTTPS.');
            panel.classList.add('open');
            toggle.disabled = true;
            return;
        }

        var recognition = new SpeechRecognition();
        recognition.lang = 'fr-FR';
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;
        recognition.continuous = false;

        var listening = false;
        var speaking = false;
        var conversationActive = false;
        var wakeMode = true;
        var wakeWords = ['nexa', 'nexa assistant', 'neksa', 'nekza'];
        var capturedText = '';
        var interimText = '';
        var silenceTimer = null;
        var watchdogTimer = null;
        var processedOnce = false;

        function clearSilenceTimer() {
            if (silenceTimer) {
                clearTimeout(silenceTimer);
                silenceTimer = null;
            }
        }

        function clearWatchdogTimer() {
            if (watchdogTimer) {
                clearTimeout(watchdogTimer);
                watchdogTimer = null;
            }
        }

        function scheduleStopOnSilence() {
            clearSilenceTimer();
            silenceTimer = setTimeout(function () {
                try {
                    recognition.stop();
                } catch (e) {
                    // ignore
                }
            }, 2200);
        }

        function normalizeText(text) {
            return (text || '')
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s]/g, ' ')
                .replace(/\s+/g, ' ')
                .trim();
        }

        function containsWakeWord(text) {
            var n = normalizeText(text);
            return wakeWords.some(function (w) {
                return n.indexOf(w) !== -1;
            });
        }

        function stripWakeWord(text) {
            var n = normalizeText(text);
            wakeWords.forEach(function (w) {
                n = n.replace(w, ' ').replace(/\s+/g, ' ').trim();
            });
            return n;
        }

        function processCapturedText() {
            if (processedOnce) {
                return;
            }
            var text = (capturedText || interimText || '').trim();
            if (!text) {
                if (!conversationActive && wakeMode) {
                    setStatus(defaultStatus);
                } else {
                    setStatus('Aucun son detecte. Reessayez avec une phrase complete.');
                }
                return;
            }

            if (wakeMode && !conversationActive) {
                if (!containsWakeWord(text)) {
                    setStatus(defaultStatus);
                    return;
                }

                var withoutWake = stripWakeWord(text);
                if (withoutWake === '') {
                    speaking = true;
                    setStatus('NEXA: Oui, je vous ecoute.');
                    appendHistory('assistant', 'Oui, je vous ecoute.');
                    speak('Oui, je vous ecoute.', function () {
                        speaking = false;
                        // If only wake word was captured, relaunch one short listen window.
                        setTimeout(function () {
                            requestStartRecognition();
                        }, 250);
                    });
                    return;
                }
                text = withoutWake;
            }

            processedOnce = true;
            transcript.textContent = 'Vous: ' + text;
            appendHistory('user', text);
            setStatus('Traitement...');

            askBackend(text).then(function (data) {
                var sourceLabel = data.aiSource === 'openai' ? 'NEXA IA' : 'NEXA';
                var intentLabel = data.intent ? ' [' + data.intent + ']' : '';
                setStatus(sourceLabel + intentLabel + ': ' + data.reply);
                appendHistory('assistant', data.reply);
                if (data.actionUrl) {
                    // Redirect should not depend only on speech onend.
                    setTimeout(function () {
                        window.location.href = data.actionUrl;
                    }, 350);
                }
                speaking = true;
                speak(data.reply, function () {
                    speaking = false;
                });
            }).catch(function () {
                var reply = localReply(text);
                setStatus('NEXA: ' + reply);
                appendHistory('assistant', reply);
                speaking = true;
                speak(reply, function () {
                    speaking = false;
                });
            });
        }

        function setListening(value) {
            listening = value;
            toggle.classList.toggle('listening', value);
            if (value) {
                setStatus('Ecoute en cours...');
            } else if (status.textContent === 'Ecoute en cours...') {
                setStatus(defaultStatus);
            }
        }

        function requestStartRecognition() {
            if (listening || speaking) {
                return;
            }
            panel.classList.add('open');
            transcript.textContent = '';
            capturedText = '';
            interimText = '';
            processedOnce = false;
            clearSilenceTimer();
            setStatus('Demande d acces micro...');
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                setStatus('Micro non disponible via navigateur. Testez Chrome/Edge.');
                return;
            }

            navigator.mediaDevices.getUserMedia({ audio: true }).then(function (stream) {
                // Permission OK, on libere tout de suite et on lance la reconnaissance.
                stream.getTracks().forEach(function (track) { track.stop(); });
                try {
                    recognition.start();
                    clearWatchdogTimer();
                    watchdogTimer = setTimeout(function () {
                        try {
                            recognition.stop();
                        } catch (e) {
                            // ignore
                        }
                    }, 7000);
                } catch (e) {
                    setStatus('Impossible de demarrer le micro: ' + (e && e.message ? e.message : 'erreur inconnue'));
                }
            }).catch(function (err) {
                var reason = err && err.name ? err.name : 'permission_refusee';
                setStatus('Acces micro refuse/bloque: ' + reason + '. Verifiez navigateur et Windows.');
            });
        }

        toggle.addEventListener('click', function () {
            conversationActive = false;
            wakeMode = true;
            setStatus('Parlez maintenant: dites "NEXA + commande".');
            requestStartRecognition();
        });

        recognition.onstart = function () {
            setListening(true);
            setStatus('Ecoute en cours... Parlez maintenant.');
        };

        recognition.onaudiostart = function () {
            setStatus('Micro capte le son...');
        };

        recognition.onspeechstart = function () {
            setStatus('Parole detectee...');
        };

        recognition.onend = function () {
            clearSilenceTimer();
            clearWatchdogTimer();
            setListening(false);
            processCapturedText();
        };

        recognition.onerror = function (event) {
            var reason = event && event.error ? event.error : 'inconnue';
            setStatus('Erreur micro: ' + reason + '. Verifiez permissions navigateur.');
            clearSilenceTimer();
            clearWatchdogTimer();
            setListening(false);
        };

        recognition.onnomatch = function () {
            setStatus('Aucune phrase comprise. Reessayez plus pres du micro.');
        };

        recognition.onresult = function (event) {
            var finalChunks = [];
            for (var i = 0; i < event.results.length; i++) {
                var part = event.results[i] && event.results[i][0] ? event.results[i][0].transcript : '';
                if (part && event.results[i].isFinal) {
                    finalChunks.push(part);
                }
            }
            if (finalChunks.length > 0) {
                capturedText = finalChunks.join(' ').replace(/\s+/g, ' ').trim();
                clearWatchdogTimer();
                try {
                    recognition.stop();
                } catch (e) {
                    // ignore
                }
            }
            var liveText = capturedText || interimText;
            transcript.textContent = liveText ? ('Vous: ' + liveText) : 'Vous: ...';
            setStatus('Parole detectee... traitement.');
        };

        setStatus(defaultStatus);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
