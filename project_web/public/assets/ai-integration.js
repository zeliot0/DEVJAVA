/**
 * AI Features Integration for Task Drawer
 */

document.addEventListener('DOMContentLoaded', () => {
    console.log('Initializing AI Features Integration...');

    const aiGenerateDescBtn = document.getElementById('aiGenerateDesc');
    const aiAnalyzeTaskBtn = document.getElementById('aiAnalyzeTask');
    const exportPdfBtn = document.getElementById('exportPdfBtn');
    const aiSuggestionsPanel = document.getElementById('aiSuggestions');
    const aiSuggestionsContent = document.getElementById('aiSuggestionsContent');

    if (aiGenerateDescBtn) {
        aiGenerateDescBtn.addEventListener('click', async () => {
            const titleInput = document.getElementById('fTitle');
            const descTextarea = document.getElementById('fDesc');

            if (!titleInput || !titleInput.value.trim()) {
                showToast({ type: 'warning', title: 'Attention', message: 'Veuillez d\'abord saisir un titre de tache' });
                return;
            }

            const title = titleInput.value.trim();
            const currentDesc = descTextarea ? descTextarea.value : '';
            const generatedDesc = await window.aiAssistant.generateDescription(title, currentDesc);

            if (generatedDesc && descTextarea) {
                descTextarea.value = generatedDesc;
                descTextarea.classList.add('ai-generated');
                showToast({ type: 'success', title: 'IA', message: 'Description generee avec succes' });
            }
        });
    }

    if (aiAnalyzeTaskBtn) {
        aiAnalyzeTaskBtn.addEventListener('click', async () => {
            const titleInput = document.getElementById('fTitle');
            const descTextarea = document.getElementById('fDesc');
            const prioSelect = document.getElementById('fPrio');
            const dueInput = document.getElementById('fDue');

            if (!titleInput || !titleInput.value.trim()) {
                showToast({ type: 'warning', title: 'Attention', message: 'Veuillez d\'abord saisir un titre de tache' });
                return;
            }

            const task = {
                title: titleInput.value.trim(),
                description: descTextarea ? descTextarea.value : '',
                priority: prioSelect ? prioSelect.value : 'med',
                dueAt: dueInput ? dueInput.value : null,
            };

            const analysis = await window.aiAssistant.analyzeTask(task);
            if (analysis) {
                displayAISuggestions(analysis);
                showToast({ type: 'success', title: 'IA', message: 'Analyse terminee' });
            }
        });
    }

    if (exportPdfBtn) {
        exportPdfBtn.addEventListener('click', async () => {
            const tasks = window.allTasks || [];
            const categories = window.allCategories || [];

            if (tasks.length === 0) {
                showToast({ type: 'warning', title: 'Attention', message: 'Aucune tache a exporter' });
                return;
            }

            await window.pdfExporter.exportBoard(tasks, categories);
        });
    }

    function displayAISuggestions(analysis) {
        if (!aiSuggestionsPanel || !aiSuggestionsContent) return;

        let html = '';

        if (analysis.suggestions && analysis.suggestions.length > 0) {
            analysis.suggestions.forEach((suggestion) => {
                html += `<div class="ai-suggestion-item">${suggestion}</div>`;
            });
        }

        const complexity = analysis.complexity ? String(analysis.complexity).toLowerCase() : null;
        const badges = [];

        if (complexity) {
            badges.push(`
                <span class="complexity-badge complexity-${complexity}">
                    <i class="fa-solid fa-chart-simple"></i> Complexite: ${analysis.complexity}
                </span>
            `);
        }
        if (analysis.estimatedTime) {
            badges.push(`
                <span class="time-estimate">
                    <i class="fa-solid fa-clock"></i> ~${analysis.estimatedTime}h
                </span>
            `);
        }
        if (analysis.storyPoints) {
            badges.push(`
                <span class="time-estimate">
                    <i class="fa-solid fa-layer-group"></i> ${analysis.storyPoints} SP
                </span>
            `);
        }
        if (typeof analysis.riskScore === 'number') {
            badges.push(`
                <span class="time-estimate">
                    <i class="fa-solid fa-triangle-exclamation"></i> Risque: ${analysis.riskScore}/100 (${analysis.riskLevel || 'n/a'})
                </span>
            `);
        }

        if (badges.length > 0) {
            html += `<div style="display:flex;gap:10px;margin-top:15px;flex-wrap:wrap;">${badges.join('')}</div>`;
        }

        aiSuggestionsContent.innerHTML = html;
        aiSuggestionsPanel.classList.add('active');
    }

    function showToast({ type, title, message }) {
        if (window.showToast) {
            window.showToast({ type, title, message });
        } else {
            console.log(`[${type.toUpperCase()}] ${title}: ${message}`);
        }
    }

    console.log('AI Features Integration Ready');
});
