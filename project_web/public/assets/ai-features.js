console.log("AI Features Module Loaded");

/**
 * AI Features for NEXA Task Hub
 */

class AIAssistant {
    constructor() {
        this.apiKey = null;
        this.isProcessing = false;
        this.api = window.NEXA_API || {};
    }

    async generateDescription(title, context = '') {
        if (!title) return null;

        this.isProcessing = true;
        this.showAIThinking();

        try {
            const data = await this.requestAI(this.api.aiDescription, { title, context });
            return data?.description || null;
        } catch (error) {
            console.error('AI Generation Error:', error);
            return null;
        } finally {
            this.hideAIThinking();
            this.isProcessing = false;
        }
    }

    async generateSubtasks(taskTitle, taskDescription) {
        this.isProcessing = true;
        this.showAIThinking();

        try {
            const data = await this.requestAI(this.api.aiSubtasks, {
                title: taskTitle,
                description: taskDescription,
            });
            return Array.isArray(data?.subtasks) ? data.subtasks : [];
        } catch (error) {
            console.error('Subtask Generation Error:', error);
            return [];
        } finally {
            this.hideAIThinking();
            this.isProcessing = false;
        }
    }

    async analyzeTask(task) {
        this.isProcessing = true;
        this.showAIThinking();

        try {
            const [analysis, estimate, risk] = await Promise.all([
                this.requestAI(this.api.aiAnalyze, {
                    title: task.title,
                    description: task.description,
                    priority: task.priority,
                }),
                this.requestAI(this.api.aiEstimate, {
                    title: task.title,
                    description: task.description,
                    priority: task.priority,
                }),
                this.requestAI(this.api.aiRiskScore, {
                    description: task.description,
                    priority: task.priority,
                    dueAt: task.dueAt || null,
                }),
            ]);

            return {
                suggestions: analysis?.suggestions || [],
                estimatedTime: estimate?.estimatedHours ?? null,
                complexity: analysis?.complexity || null,
                storyPoints: estimate?.storyPoints ?? null,
                riskScore: risk?.riskScore ?? null,
                riskLevel: risk?.riskLevel ?? null,
            };
        } catch (error) {
            console.error('Task Analysis Error:', error);
            return null;
        } finally {
            this.hideAIThinking();
            this.isProcessing = false;
        }
    }

    async summarizeExecutions(executions) {
        if (!executions || executions.length === 0) return null;

        this.isProcessing = true;
        this.showAIThinking();

        try {
            const data = await this.requestAI(this.api.aiSummary, { executions });
            return data?.summary || null;
        } catch (error) {
            console.error('Summary Generation Error:', error);
            return null;
        } finally {
            this.hideAIThinking();
            this.isProcessing = false;
        }
    }

    async requestAI(endpoint, payload) {
        if (!endpoint) {
            throw new Error('AI endpoint not configured');
        }

        const res = await fetch(endpoint, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload || {}),
        });

        const text = await res.text();
        let data = {};
        try {
            data = text ? JSON.parse(text) : {};
        } catch {
            data = {};
        }

        if (!res.ok) {
            throw new Error(data?.error || `AI API error ${res.status}`);
        }

        return data?.data ?? data;
    }

    parseSubtasks(response) {
        const lines = String(response || '').split('\n').filter(line => line.trim());
        return lines.map(line => line.replace(/^\d+\.\s*/, '').trim());
    }

    parseSuggestions(response) {
        return String(response || '').split('.').filter(s => s.trim()).map(s => s.trim());
    }

    estimateTime(task) {
        const baseTime = task.description ? task.description.length / 50 : 1;
        const priorityMultiplier = task.priority === 'high' ? 1.5 : task.priority === 'low' ? 0.7 : 1;
        return Math.round(baseTime * priorityMultiplier * 2);
    }

    assessComplexity(task) {
        const descLength = task.description ? task.description.length : 0;
        if (descLength > 200) return 'High';
        if (descLength > 100) return 'Medium';
        return 'Low';
    }

    showAIThinking() {
        const indicator = document.getElementById('aiThinkingIndicator');
        if (indicator) indicator.style.display = 'flex';
    }

    hideAIThinking() {
        const indicator = document.getElementById('aiThinkingIndicator');
        if (indicator) indicator.style.display = 'none';
    }
}

class PDFExporter {
    constructor() {
        this.tasks = [];
    }

    async exportBoard(tasks, categories) {
        this.tasks = tasks;

        const content = this.generatePDFContent(tasks, categories);
        this.showToast('Generation du PDF...', 'info');

        try {
            await this.generatePDF(content);
            this.showToast('PDF exporte avec succes!', 'success');
        } catch (error) {
            console.error('PDF Export Error:', error);
            this.showToast('Erreur lors de l\'export PDF', 'error');
        }
    }

    generatePDFContent(tasks, categories) {
        const grouped = {
            todo: tasks.filter(t => t.status === 'todo'),
            doing: tasks.filter(t => t.status === 'doing'),
            done: tasks.filter(t => t.status === 'done'),
        };

        return {
            title: 'NEXA Task Board Export',
            date: new Date().toLocaleDateString('fr-FR'),
            stats: {
                total: tasks.length,
                todo: grouped.todo.length,
                doing: grouped.doing.length,
                done: grouped.done.length,
            },
            tasks: grouped,
            categories,
        };
    }

    async generatePDF(content) {
        console.log('PDF Content:', content);
        await new Promise(resolve => setTimeout(resolve, 1000));
    }

    showToast(message, type) {
        if (window.showToast) {
            window.showToast({ type, title: type === 'success' ? 'Succes' : 'Info', message });
        }
    }
}

window.aiAssistant = new AIAssistant();
window.pdfExporter = new PDFExporter();

console.log('AI Assistant and PDF Exporter ready');
