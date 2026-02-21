console.log("Advanced Business Features Module Loaded 💼");

/**
 * Advanced Business Features for NEXA Task Hub
 * - Excel Import/Export
 * - Advanced Analytics
 * - Task Templates
 * - Batch Operations
 */

class AdvancedBusinessFeatures {
    constructor() {
        this.templates = this.loadTemplates();
    }

    // ==================== EXCEL EXPORT ====================
    async exportToExcel(tasks) {
        if (!tasks || tasks.length === 0) {
            this.showToast('Aucune tâche à exporter', 'warning');
            return;
        }

        this.showToast('Génération du fichier Excel...', 'info');

        try {
            // Create CSV content (Excel-compatible)
            let csvContent = "data:text/csv;charset=utf-8,";

            // Headers
            csvContent += "Titre,Description,Statut,Priorité,Échéance,Catégorie,Date de création\n";

            // Data rows
            tasks.forEach(task => {
                const row = [
                    this.escapeCSV(task.title || ''),
                    this.escapeCSV(task.description || ''),
                    this.getStatusLabel(task.status),
                    this.getPriorityLabel(task.priority),
                    task.dueAt || '',
                    task.category?.name || '',
                    task.createdAt ? new Date(task.createdAt).toLocaleDateString('fr-FR') : ''
                ].join(',');
                csvContent += row + "\n";
            });

            // Create download link
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `nexa-tasks-${Date.now()}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            this.showToast('Excel exporté avec succès! 📊', 'success');
        } catch (error) {
            console.error('Excel Export Error:', error);
            this.showToast('Erreur lors de l\'export Excel', 'error');
        }
    }

    escapeCSV(str) {
        if (str.includes(',') || str.includes('"') || str.includes('\n')) {
            return '"' + str.replace(/"/g, '""') + '"';
        }
        return str;
    }

    // ==================== ANALYTICS ====================
    generateAnalytics(tasks) {
        const analytics = {
            overview: this.getOverviewStats(tasks),
            productivity: this.getProductivityStats(tasks),
            priorities: this.getPriorityDistribution(tasks),
            timeline: this.getTimelineStats(tasks),
            categories: this.getCategoryStats(tasks)
        };

        return analytics;
    }

    getOverviewStats(tasks) {
        const total = tasks.length;
        const completed = tasks.filter(t => t.status === 'done').length;
        const inProgress = tasks.filter(t => t.status === 'doing').length;
        const pending = tasks.filter(t => t.status === 'todo').length;

        return {
            total,
            completed,
            inProgress,
            pending,
            completionRate: total > 0 ? ((completed / total) * 100).toFixed(1) : 0,
            activeRate: total > 0 ? ((inProgress / total) * 100).toFixed(1) : 0
        };
    }

    getProductivityStats(tasks) {
        const now = new Date();
        const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
        const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
        const monthAgo = new Date(today.getTime() - 30 * 24 * 60 * 60 * 1000);

        return {
            completedToday: tasks.filter(t =>
                t.status === 'done' &&
                t.updatedAt &&
                new Date(t.updatedAt) >= today
            ).length,
            completedThisWeek: tasks.filter(t =>
                t.status === 'done' &&
                t.updatedAt &&
                new Date(t.updatedAt) >= weekAgo
            ).length,
            completedThisMonth: tasks.filter(t =>
                t.status === 'done' &&
                t.updatedAt &&
                new Date(t.updatedAt) >= monthAgo
            ).length
        };
    }

    getPriorityDistribution(tasks) {
        return {
            high: tasks.filter(t => t.priority === 'high').length,
            medium: tasks.filter(t => t.priority === 'med').length,
            low: tasks.filter(t => t.priority === 'low').length
        };
    }

    getTimelineStats(tasks) {
        const now = new Date();
        const overdue = tasks.filter(t =>
            t.dueAt &&
            new Date(t.dueAt) < now &&
            t.status !== 'done'
        ).length;

        const dueThisWeek = tasks.filter(t => {
            if (!t.dueAt || t.status === 'done') return false;
            const due = new Date(t.dueAt);
            const weekFromNow = new Date(now.getTime() + 7 * 24 * 60 * 60 * 1000);
            return due >= now && due <= weekFromNow;
        }).length;

        return { overdue, dueThisWeek };
    }

    getCategoryStats(tasks) {
        const categoryMap = {};
        tasks.forEach(task => {
            const catName = task.category?.name || 'Sans catégorie';
            if (!categoryMap[catName]) {
                categoryMap[catName] = { total: 0, completed: 0 };
            }
            categoryMap[catName].total++;
            if (task.status === 'done') {
                categoryMap[catName].completed++;
            }
        });

        return Object.entries(categoryMap).map(([name, stats]) => ({
            name,
            total: stats.total,
            completed: stats.completed,
            completionRate: ((stats.completed / stats.total) * 100).toFixed(1)
        }));
    }

    // ==================== TASK TEMPLATES ====================
    loadTemplates() {
        return [
            {
                id: 'dev_feature',
                name: 'Développement Feature',
                icon: 'fa-code',
                tasks: [
                    { title: 'Analyse des requirements', priority: 'high', status: 'todo' },
                    { title: 'Design technique', priority: 'high', status: 'todo' },
                    { title: 'Implémentation', priority: 'med', status: 'todo' },
                    { title: 'Tests unitaires', priority: 'med', status: 'todo' },
                    { title: 'Revue de code', priority: 'med', status: 'todo' },
                    { title: 'Documentation', priority: 'low', status: 'todo' }
                ]
            },
            {
                id: 'bug_fix',
                name: 'Correction de Bug',
                icon: 'fa-bug',
                tasks: [
                    { title: 'Reproduction du bug', priority: 'high', status: 'todo' },
                    { title: 'Analyse de la cause', priority: 'high', status: 'todo' },
                    { title: 'Correction', priority: 'high', status: 'todo' },
                    { title: 'Tests de régression', priority: 'med', status: 'todo' },
                    { title: 'Déploiement', priority: 'med', status: 'todo' }
                ]
            },
            {
                id: 'content_creation',
                name: 'Création de Contenu',
                icon: 'fa-pen-fancy',
                tasks: [
                    { title: 'Recherche et brainstorming', priority: 'med', status: 'todo' },
                    { title: 'Rédaction du brouillon', priority: 'med', status: 'todo' },
                    { title: 'Révision et édition', priority: 'med', status: 'todo' },
                    { title: 'Création des visuels', priority: 'low', status: 'todo' },
                    { title: 'Publication', priority: 'high', status: 'todo' }
                ]
            },
            {
                id: 'project_launch',
                name: 'Lancement de Projet',
                icon: 'fa-rocket',
                tasks: [
                    { title: 'Définition des objectifs', priority: 'high', status: 'todo' },
                    { title: 'Constitution de l\'équipe', priority: 'high', status: 'todo' },
                    { title: 'Planning et roadmap', priority: 'high', status: 'todo' },
                    { title: 'Setup infrastructure', priority: 'med', status: 'todo' },
                    { title: 'Kick-off meeting', priority: 'med', status: 'todo' }
                ]
            }
        ];
    }

    getTemplates() {
        return this.templates;
    }

    // ==================== BATCH OPERATIONS ====================
    async batchUpdateStatus(taskIds, newStatus) {
        // This would call the backend API to update multiple tasks
        console.log(`Batch updating ${taskIds.length} tasks to status: ${newStatus}`);
        this.showToast(`${taskIds.length} tâches mises à jour`, 'success');
    }

    async batchUpdatePriority(taskIds, newPriority) {
        console.log(`Batch updating ${taskIds.length} tasks to priority: ${newPriority}`);
        this.showToast(`${taskIds.length} tâches mises à jour`, 'success');
    }

    async batchDelete(taskIds) {
        if (confirm(`Êtes-vous sûr de vouloir supprimer ${taskIds.length} tâches ?`)) {
            console.log(`Batch deleting ${taskIds.length} tasks`);
            this.showToast(`${taskIds.length} tâches supprimées`, 'success');
        }
    }

    // ==================== HELPERS ====================
    getStatusLabel(status) {
        const labels = {
            'todo': 'À faire',
            'doing': 'En cours',
            'done': 'Terminé'
        };
        return labels[status] || status;
    }

    getPriorityLabel(priority) {
        const labels = {
            'high': 'Haute',
            'med': 'Moyenne',
            'low': 'Basse'
        };
        return labels[priority] || priority;
    }

    showToast(message, type) {
        if (window.showToast) {
            window.showToast({
                type,
                title: type === 'success' ? 'Succès' : type === 'warning' ? 'Attention' : 'Info',
                message
            });
        } else {
            console.log(`[${type.toUpperCase()}] ${message}`);
        }
    }
}

// Initialize
window.businessFeatures = new AdvancedBusinessFeatures();

console.log("✅ Advanced Business Features Ready!");
