(function () {

  const page = document.querySelector("[data-suite-page]")?.dataset.suitePage || "";

  const pretty = (value) => JSON.stringify(value, null, 2);
  const parseJson = async (res) => {
    const data = await res.json();
    if (!res.ok) {
      throw new Error(data.error || "Request failed");
    }
    return data;
  };

  const postJson = async (url, payload) => {
    const res = await fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload || {}),
    });
    return parseJson(res);
  };

  const getJson = async (url) => {
    const res = await fetch(url);
    return parseJson(res);
  };

  const parseQuickCapture = (raw) => {
    const text = raw.trim();
    const low = text.toLowerCase();
    let dueAt = null;
    let priority = "med";

    if (low.includes("tomorrow")) {
      const d = new Date();
      d.setDate(d.getDate() + 1);
      dueAt = d.toISOString().slice(0, 10);
    } else if (low.includes("today")) {
      dueAt = new Date().toISOString().slice(0, 10);
    } else {
      const match = text.match(/\b(\d{4}-\d{2}-\d{2})\b/);
      if (match) dueAt = match[1];
    }

    if (low.includes("high")) priority = "high";
    else if (low.includes("low")) priority = "low";

    const title = text
      .replace(/\b(today|tomorrow|high|low|medium|med)\b/gi, "")
      .replace(/\b\d{4}-\d{2}-\d{2}\b/g, "")
      .trim();

    return {
      title: title || text,
      description: "Created by Quick Capture",
      priority,
      status: "todo",
      dueAt,
    };
  };

  const mountPlanner = () => {
    const input = document.getElementById("quickCaptureInput");
    const btn = document.getElementById("quickCaptureBtn");
    const result = document.getElementById("quickCaptureResult");

    if (!input || !btn || !result) return;

    btn.addEventListener("click", async () => {
      try {
        const payload = parseQuickCapture(input.value);
        if (!payload.title) {
          result.textContent = "Please write a task text first.";
          return;
        }
        const created = await postJson("/api/tasks", payload);
        result.textContent = `Task created: #${created.id} ${created.title}`;
        input.value = "";
      } catch (e) {
        result.textContent = `Error: ${e.message}`;
      }
    });
  };

  const mountAi = () => {
    const output = document.getElementById("aiOutput");
    const title = document.getElementById("aiTitle");
    const desc = document.getElementById("aiDescription");
    const priority = document.getElementById("aiPriority");
    const dueAt = document.getElementById("aiDueAt");
    const geminiModel = document.getElementById("geminiModel");
    const providerBadge = document.getElementById("aiProviderBadge");
    const statusLabel = document.getElementById("aiActionStatus");
    if (!output || !title || !desc || !priority || !dueAt) return;

    const payload = () => ({
      title: title.value.trim(),
      description: desc.value.trim(),
      context: desc.value.trim(),
      priority: priority.value,
      dueAt: dueAt.value || null,
    });

    const showOutput = (action, data) => {
      output.textContent = pretty({
        action,
        provider: data?.provider || "local",
        model: data?.model || null,
        data: data?.data ?? data,
      });
      if (providerBadge) {
        providerBadge.textContent = `Provider: ${data?.provider || "local"}`;
      }
    };

    const runAction = async (action, url, extraPayload) => {
      if (statusLabel) statusLabel.textContent = `Running: ${action}...`;
      try {
        const data = await postJson(url, { ...payload(), ...(extraPayload || {}) });
        showOutput(action, data);
        if (url === "/api/ai/description" && data?.data?.description) {
          desc.value = data.data.description;
        }
        if (statusLabel) statusLabel.textContent = `Done: ${action}`;
      } catch (e) {
        output.textContent = `Error: ${e.message}`;
        if (providerBadge) providerBadge.textContent = "Provider: unavailable";
        if (statusLabel) statusLabel.textContent = `Failed: ${action}`;
      }
    };

    const bind = (id, action, url, extraPayloadFactory) => {
      const btn = document.getElementById(id);
      if (!btn) return;
      btn.addEventListener("click", async () => {
        await runAction(action, url, extraPayloadFactory ? extraPayloadFactory() : {});
      });
    };

    bind("btnAiDescription", "Smart Description", "/api/ai/description", () => ({
      model: geminiModel?.value?.trim() || "gemini-2.0-flash",
    }));
    bind("btnAiAnalyze", "Analyze", "/api/ai/analyze");
    bind("btnAiSubtasks", "Subtasks", "/api/ai/subtasks");
    bind("btnAiEstimate", "Estimate", "/api/ai/estimate");
    bind("btnAiRisk", "Risk Score", "/api/ai/risk-score");
    bind("btnGeminiFlash", "Gemini Flash", "/api/ai/gemini-flash", () => ({
      model: geminiModel?.value?.trim() || "gemini-2.0-flash",
    }));
  };

  const renderBars = (elementId, dataObj) => {
    const el = document.getElementById(elementId);
    if (!el) return;
    const entries = Object.entries(dataObj || {});
    if (entries.length === 0) {
      el.innerHTML = "<p>No data</p>";
      return;
    }
    const max = Math.max(...entries.map(([, v]) => Number(v || 0)), 1);
    el.innerHTML = entries
      .map(([label, value]) => {
        const num = Number(value || 0);
        const pct = Math.max(4, Math.round((num / max) * 100));
        return `
          <div class="bar-line">
            <span>${label}</span>
            <div class="bar-track"><div class="bar-fill" style="width:${pct}%"></div></div>
            <strong>${num}</strong>
          </div>
        `;
      })
      .join("");
  };

  const mountInsights = async () => {
    try {
      const [dashboard, cycle, workload, throughput] = await Promise.all([
        getJson("/api/dashboard/stats"),
        getJson("/api/analytics/cycle-time"),
        getJson("/api/analytics/workload?groupBy=status"),
        getJson("/api/analytics/throughput"),
      ]);

      const total = Number(dashboard?.totals?.tasks || 0);
      const done = Number(dashboard?.tasksByStatus?.done || 0);
      const completion = total > 0 ? Math.round((done / total) * 100) : 0;

      document.getElementById("kpiTotal").textContent = String(total);
      document.getElementById("kpiDone").textContent = String(done);
      document.getElementById("kpiCycle").textContent = String(cycle.averageHours ?? 0);
      document.getElementById("kpiCompletion").textContent = `${completion}%`;

      renderBars("chartWorkload", workload.data);
      renderBars("chartThroughput", throughput.data);
    } catch (e) {
      const area = document.getElementById("insightsKpis");
      if (area) {
        area.insertAdjacentHTML("afterend", `<p class="muted">Insights error: ${e.message}</p>`);
      }
    }
  };

  const mountAutomation = () => {
    const out = document.getElementById("automationOutput");
    if (!out) return;
    const write = (label, data) => {
      out.textContent = `${label}\n\n${pretty(data)}`;
    };

    const bind = (id, action) => {
      const btn = document.getElementById(id);
      if (!btn) return;
      btn.addEventListener("click", action);
    };

    bind("autoPrioritizeAllBtn", async () => {
      try {
        write("Running auto-prioritize...", {});
        const data = await postJson("/api/tasks/auto-prioritize", {});
        write("Auto-prioritize result", data);
      } catch (e) {
        write("Error", { message: e.message });
      }
    });

    bind("loadTodayBtn", async () => {
      try {
        const data = await getJson("/api/tasks/today");
        write("Today tasks", data);
      } catch (e) {
        write("Error", { message: e.message });
      }
    });

    bind("loadOverdueBtn", async () => {
      try {
        const data = await getJson("/api/tasks/overdue");
        write("Overdue tasks", data);
      } catch (e) {
        write("Error", { message: e.message });
      }
    });

    bind("loadCalendarBtn", async () => {
      try {
        const data = await getJson("/api/calendar/events");
        write("Calendar events", data);
      } catch (e) {
        write("Error", { message: e.message });
      }
    });

    bind("loadWeatherBtn", async () => {
      try {
        const data = await getJson("/api/weather/current?city=New%20York");
        write("Weather info", data);
      } catch (e) {
        write("Error", { message: e.message });
      }
    });

    bind("loadHolidaysBtn", async () => {
      try {
        const year = new Date().getFullYear();
        const data = await getJson(`https://date.nager.at/api/v3/PublicHolidays/${year}/US`);
        write("US holidays (Nager.Date)", data.slice(0, 20));
      } catch (e) {
        write("Error", { message: e.message });
      }
    });
  };

  const mountFocus = () => {
    const blitzContainer = document.getElementById("focusBlitzContainer");
    const timerDisplay = document.getElementById("timerDisplay");
    const progressCircle = document.getElementById("timerProgressCircle");
    const taskItems = document.querySelectorAll(".focus-task-item");
    const currentTitleEl = document.getElementById("currentTaskTitle");
    const statusLabel = document.getElementById("focusStatusLabel");
    const toggleBtn = document.getElementById("blitzToggle");
    const resetBtn = document.getElementById("blitzReset");
    const skipBtn = document.getElementById("blitzSkip");
    const sessionsTodayEl = document.getElementById("focusSessionsCount");
    const minutesTodayEl = document.getElementById("focusTimeTotal");
    const streakEl = document.getElementById("focusStreakDays");
    const ambientAudio = document.getElementById("focusAmbientAudio");
    const toggleMusicBtn = document.getElementById("toggleMusicFocus");
    const nowPlayingLabel = document.getElementById("nowPlayingLabel");
    const settingsToggle = document.getElementById("btnSettingsToggle");
    const settingsPanel = document.getElementById("focusSettingsPanel");
    const closeSettings = document.getElementById("closeSettingsFocus");
    const saveSettings = document.getElementById("saveSettingsFocus");

    if (!timerDisplay || !blitzContainer) return;

    // --- Stats & LocalStorage ---
    const statsKey = "blitz_focus_stats_v2";
    const settingsKey = "blitz_focus_settings_v2";

    const loadStats = () => {
      try { return JSON.parse(localStorage.getItem(statsKey) || "{}"); }
      catch { return {}; }
    };
    const saveStats = (s) => localStorage.setItem(statsKey, JSON.stringify(s));

    const loadSettings = () => {
      try { return JSON.parse(localStorage.getItem(settingsKey) || '{"focus": 25, "break": 5}'); }
      catch { return { "focus": 25, "break": 5 }; }
    };
    const saveSettingsData = (s) => localStorage.setItem(settingsKey, JSON.stringify(s));

    let stats = loadStats();
    let settings = loadSettings();
    const todayStr = new Date().toISOString().slice(0, 10);

    if (!stats.days) stats.days = {};
    if (!stats.days[todayStr]) stats.days[todayStr] = { sessions: 0, minutes: 0 };

    const updateStatsUI = () => {
      const d = stats.days[todayStr];
      if (sessionsTodayEl) sessionsTodayEl.textContent = d.sessions;
      if (minutesTodayEl) minutesTodayEl.textContent = `${d.minutes}m`;

      let streak = 0;
      let check = new Date();
      while (true) {
        const k = check.toISOString().slice(0, 10);
        if (stats.days[k] && stats.days[k].sessions > 0) {
          streak++;
          check.setDate(check.getDate() - 1);
        } else break;
      }
      if (streakEl) streakEl.textContent = `${streak}d`;
    };

    // --- Timer Logic ---
    let phase = "focus";
    let timeLeft = settings.focus * 60;
    let totalTime = settings.focus * 60;
    let intervalId = null;
    let isRunning = false;

    const formatTime = (s) => {
      const m = Math.floor(s / 60);
      const sec = s % 60;
      return `${String(m).padStart(2, '0')}:${String(sec).padStart(2, '0')}`;
    };

    const updateProgressCircle = () => {
      if (!progressCircle) return;
      const radius = 90;
      const circumference = 2 * Math.PI * radius;
      const offset = circumference - (timeLeft / totalTime) * circumference;
      progressCircle.style.strokeDasharray = `${circumference} ${circumference}`;
      progressCircle.style.strokeDashoffset = isNaN(offset) ? 0 : offset;
    };

    const playNotification = () => {
      try {
        const ctx = new (window.AudioContext || window.webkitAudioContext)();
        const osc = ctx.createOscillator();
        const g = ctx.createGain();
        osc.connect(g); g.connect(ctx.destination);
        osc.type = "sine"; osc.frequency.value = 523.25;
        g.gain.setValueAtTime(0, ctx.currentTime);
        g.gain.linearRampToValueAtTime(0.1, ctx.currentTime + 0.1);
        g.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 1);
        osc.start(); osc.stop(ctx.currentTime + 1);
      } catch (e) { }
    };

    const switchPhase = () => {
      playNotification();
      if (phase === "focus") {
        phase = "break";
        timeLeft = settings.break * 60;
        totalTime = settings.break * 60;
        blitzContainer.classList.add("break-mode");
        if (statusLabel) statusLabel.textContent = "Take a Break";

        stats.days[todayStr].sessions++;
        stats.days[todayStr].minutes += settings.focus;
        saveStats(stats);
        updateStatsUI();
      } else {
        phase = "focus";
        timeLeft = settings.focus * 60;
        totalTime = settings.focus * 60;
        blitzContainer.classList.remove("break-mode");
        if (statusLabel) statusLabel.textContent = "Focusing On";
      }
      updateTimerUI();
    };

    const tick = () => {
      if (timeLeft > 0) {
        timeLeft--;
        updateTimerUI();
      } else {
        pauseTimer();
        switchPhase();
      }
    };

    const updateTimerUI = () => {
      if (timerDisplay) timerDisplay.textContent = formatTime(timeLeft);
      updateProgressCircle();
      document.title = `${formatTime(timeLeft)} - ${phase === 'focus' ? 'Focus' : 'Break'}`;
    };

    const startTimer = () => {
      if (isRunning) return;
      isRunning = true;
      intervalId = setInterval(tick, 1000);
      if (toggleBtn) toggleBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
    };

    const pauseTimer = () => {
      isRunning = false;
      clearInterval(intervalId);
      if (toggleBtn) toggleBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
    };

    const resetTimer = () => {
      pauseTimer();
      phase = "focus";
      timeLeft = settings.focus * 60;
      totalTime = settings.focus * 60;
      blitzContainer.classList.remove("break-mode");
      if (statusLabel) statusLabel.textContent = "Focusing On";
      updateTimerUI();
    };

    // --- Task Handling ---
    taskItems.forEach(item => {
      item.addEventListener("click", () => {
        taskItems.forEach(i => i.classList.remove("active"));
        item.classList.add("active");
        if (currentTitleEl) currentTitleEl.textContent = item.dataset.taskTitle;
      });
    });

    // --- Settings ---
    settingsToggle?.addEventListener("click", () => {
      settingsPanel.style.display = "block";
      const inf = document.getElementById("inputFocusTime");
      const inb = document.getElementById("inputBreakTime");
      if (inf) inf.value = settings.focus;
      if (inb) inb.value = settings.break;
    });

    closeSettings?.addEventListener("click", () => {
      settingsPanel.style.display = "none";
    });

    saveSettings?.addEventListener("click", () => {
      const inf = document.getElementById("inputFocusTime");
      const inb = document.getElementById("inputBreakTime");
      settings.focus = parseInt(inf.value) || 25;
      settings.break = parseInt(inb.value) || 5;
      saveSettingsData(settings);
      settingsPanel.style.display = "none";
      resetTimer();
    });

    // --- Music ---
    toggleMusicBtn?.addEventListener("click", () => {
      if (ambientAudio.paused) {
        ambientAudio.play();
        toggleMusicBtn.innerHTML = '<i class="fa-solid fa-pause" style="font-size:0.7rem; margin-left:10px;"></i>';
        if (nowPlayingLabel) nowPlayingLabel.textContent = "Rainy Focus (Lo-fi)";
      } else {
        ambientAudio.pause();
        toggleMusicBtn.innerHTML = '<i class="fa-solid fa-play" style="font-size:0.7rem; margin-left:10px;"></i>';
        if (nowPlayingLabel) nowPlayingLabel.textContent = "Music Paused";
      }
    });

    const doneBtn = document.getElementById("blitzDone");

    // --- Direct Controls ---
    toggleBtn?.addEventListener("click", () => {
      isRunning ? pauseTimer() : startTimer();
    });
    resetBtn?.addEventListener("click", resetTimer);
    skipBtn?.addEventListener("click", () => {
      pauseTimer();
      switchPhase();
    });

    doneBtn?.addEventListener("click", async () => {
      const activeItem = document.querySelector(".focus-task-item.active");
      if (!activeItem) return;

      const taskId = activeItem.dataset.taskId;
      activeItem.style.opacity = "0.5";
      activeItem.style.pointerEvents = "none";

      try {
        await fetch(`/api/tasks/${taskId}/status`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ status: 'done' })
        });

        const nextItem = activeItem.nextElementSibling;
        activeItem.remove();

        if (nextItem && nextItem.classList.contains("focus-task-item")) {
          nextItem.click();
        } else {
          if (currentTitleEl) currentTitleEl.textContent = "Queue Complete!";
        }

        playNotification();
      } catch (e) {
        console.error("Failed to complete task", e);
        activeItem.style.opacity = "1";
        activeItem.style.pointerEvents = "auto";
      }
    });

    // --- Init ---
    updateStatsUI();
    resetTimer();
  };

  const mountMusicLounge = () => {
    const globalAudio = document.getElementById("globalAudioEngine");
    const playBtn = document.getElementById("loungePlayPause");
    const bPlayBtn = document.getElementById("mxBottomPlay");
    const titleEl = document.getElementById("loungeNowTitle");
    const artistEl = document.getElementById("loungeNowArtist");
    const listEl = document.getElementById("musicTrackList");
    const apiTermEl = document.getElementById("musicApiTerm");
    const loadBtn = document.getElementById("loadRealSongsBtn");
    const bProgress = document.getElementById("mxBottomProgress");

    if (!globalAudio || !listEl) return;

    let tracks = [];
    let currentIndex = 0;

    const setActive = (index, autoPlay = true) => {
      if (!tracks[index]) return;
      currentIndex = index;
      const data = tracks[index];

      document.querySelectorAll(".music-track-item").forEach(t => t.classList.remove("active"));
      const activeItem = listEl.children[index];
      if (activeItem) activeItem.classList.add("active");

      if (window.playGlobalTrack) {
        window.playGlobalTrack(data.previewUrl, data.trackName, data.artistName, data.artworkUrl100);
      }

      if (titleEl) titleEl.innerText = data.trackName;
      if (artistEl) artistEl.innerText = data.artistName;
    };

    const loadSongs = async (term) => {
      try {
        const res = await fetch(`https://itunes.apple.com/search?term=${encodeURIComponent(term)}&entity=song&limit=200`);
        const data = await res.json();
        tracks = data.results || [];

        listEl.innerHTML = tracks.map((s, i) => `
          <li class="music-track-item" data-index="${i}">
            <span class="index">${i + 1}</span>
            <span class="title">${s.trackName}</span>
            <span class="artist">${s.artistName}</span>
            <span class="dur">${Math.floor(s.trackTimeMillis / 60000)}:${String(Math.floor((s.trackTimeMillis % 60000) / 1000)).padStart(2, '0')}</span>
          </li>`).join("");

        Array.from(listEl.children).forEach((li, i) => {
          li.onclick = () => setActive(i);
        });

        if (tracks.length > 0) setActive(0, false);
      } catch (e) { console.error(e); }
    };

    // GLOBAL NAVIGATOR BINDING
    window.globalNext = () => setActive((currentIndex + 1) % tracks.length);
    window.globalPrev = () => setActive((currentIndex - 1 + tracks.length) % tracks.length);

    [playBtn, bPlayBtn].forEach(b => b && (b.onclick = () => globalAudio.paused ? globalAudio.play() : globalAudio.pause()));
    if (loadBtn) loadBtn.onclick = () => loadSongs(apiTermEl?.value || "Techno Energy");

    globalAudio.ontimeupdate = () => {
      if (bProgress && globalAudio.duration) bProgress.value = (globalAudio.currentTime / globalAudio.duration) * 100;
    };

    if (bProgress) bProgress.oninput = () => globalAudio.currentTime = (bProgress.value / 100) * globalAudio.duration;

    loadSongs("Top Hits 2026");
  };

  document.addEventListener("turbo:load", () => {
    const p = document.querySelector("[data-suite-page]")?.dataset.suitePage;
    if (p === "planner") mountPlanner();
    if (p === "ai") mountAi();
    if (p === "focus") mountFocus();
    if (p === "music") mountMusicLounge();
    if (p === "insights") mountInsights();
    if (p === "automation") mountAutomation();
    if (p === "workflows") mountWorkflows();

    // Resume UI state if music is already playing from another page
    const ga = document.getElementById("globalAudioEngine");
    if (ga && !ga.paused && p === "music") {
      const bt = document.getElementById("mxBottomTitle"), ba = document.getElementById("mxBottomArtist");
      const gt = document.getElementById("gpTitle"), gart = document.getElementById("gpArtist");
      if (bt && gt) bt.innerText = gt.innerText;
      if (ba && gart) ba.innerText = gart.innerText;
    }
  });

  const mountWorkflows = () => {
    const canvas = document.getElementById("nexusCanvas");
    const svg = document.getElementById("nexusSvg");
    const orbs = document.querySelectorAll(".task-node");
    const infoPanel = document.getElementById("activeTaskDetails");
    const shuffleBtn = document.getElementById("nexusRandomize");

    if (!canvas || !orbs.length) return;

    let links = [];
    for (let i = 0; i < orbs.length; i++) {
      if (i > 0) links.push([orbs[i - 1].dataset.id, orbs[i].dataset.id]);
    }

    const updateLines = () => {
      if (!svg) return;
      svg.innerHTML = "";
      links.forEach(([fromId, toId]) => {
        const from = document.getElementById(`task-${fromId}`);
        const to = document.getElementById(`task-${toId}`);
        if (!from || !to) return;
        const fromRect = from.getBoundingClientRect();
        const toRect = to.getBoundingClientRect();
        const canvasRect = canvas.getBoundingClientRect();
        const x1 = fromRect.left - canvasRect.left + fromRect.width / 2;
        const y1 = fromRect.top - canvasRect.top + fromRect.height / 2;
        const x2 = toRect.left - canvasRect.left + toRect.width / 2;
        const y2 = toRect.top - canvasRect.top + toRect.height / 2;
        const line = document.createElementNS("http://www.w3.org/2000/svg", "path");
        const cp1x = x1 + (x2 - x1) / 2;
        const cp1y = y1;
        const cp2x = x1 + (x2 - x1) / 2;
        const cp2y = y2;
        line.setAttribute("d", `M ${x1} ${y1} C ${cp1x} ${cp1y}, ${cp2x} ${cp2y}, ${x2} ${y2}`);
        line.setAttribute("class", "nexus-link");
        svg.appendChild(line);
      });
    };

    orbs.forEach(orb => {
      orb.onmousedown = (e) => {
        orbs.forEach(o => o.classList.remove('active'));
        orb.classList.add('active');
        infoPanel.innerHTML = `
                <label>Focusing Orb</label>
                <h3 style="color:#fff; margin:0;">${orb.dataset.title}</h3>
                <p style="font-size:0.8rem; color:rgba(255,255,255,0.4); margin-top:5px;">Connected to ${links.filter(l => l.includes(orb.dataset.id)).length} nodes</p>
                <div style="margin-top:15px; display:flex; gap:10px;">
                    <button class="nexus-btn" style="height:35px; padding:0 10px; font-size:0.75rem;">Edit Metadata</button>
                    <button class="nexus-btn secondary" style="height:35px; padding:0 10px; font-size:0.75rem;">Break Links</button>
                </div>
            `;
        let offsetX = e.clientX - orb.getBoundingClientRect().left;
        let offsetY = e.clientY - orb.getBoundingClientRect().top;
        const onMouseMove = (mE) => {
          let x = mE.clientX - canvas.getBoundingClientRect().left - offsetX;
          let y = mE.clientY - canvas.getBoundingClientRect().top - offsetY;
          orb.style.left = x + 'px';
          orb.style.top = y + 'px';
          updateLines();
        };
        document.addEventListener('mousemove', onMouseMove);
        document.onmouseup = () => {
          document.removeEventListener('mousemove', onMouseMove);
          document.onmouseup = null;
        };
      };
    });

    if (shuffleBtn) shuffleBtn.onclick = () => {
      orbs.forEach(orb => {
        const rx = Math.random() * (canvas.offsetWidth - 200) + 50;
        const ry = Math.random() * (canvas.offsetHeight - 150) + 50;
        orb.style.transition = "all 0.8s cubic-bezier(0.19, 1, 0.22, 1)";
        orb.style.left = rx + 'px';
        orb.style.top = ry + 'px';
        setTimeout(() => orb.style.transition = "", 800);
      });
      setTimeout(updateLines, 100);
      setTimeout(updateLines, 400);
      setTimeout(updateLines, 800);
    };

    window.addEventListener('resize', updateLines);
    setTimeout(updateLines, 500);
  };

})();
