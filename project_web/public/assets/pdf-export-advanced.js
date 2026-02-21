console.log("Advanced PDF Export Module Loaded 📄");

/**
 * Professional PDF Export with jsPDF
 * Exports all available tasks with beautiful formatting
 */

class AdvancedPDFExporter {
    constructor() {
        this.tasks = [];
        this.loadJsPDF();
    }

    async loadJsPDF() {
        // Load jsPDF from CDN if not already loaded
        if (typeof window.jspdf === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js';
            document.head.appendChild(script);

            await new Promise((resolve) => {
                script.onload = resolve;
            });
        }
    }

    async exportBoard(tasks, categories) {
        this.tasks = tasks;

        if (!tasks || tasks.length === 0) {
            this.showToast('Aucune tâche à exporter', 'warning');
            return;
        }

        this.showToast('Génération du PDF en cours... ⏳', 'info');

        try {
            await this.loadJsPDF();
            await this.generatePDF(tasks, categories);
            this.showToast('PDF exporté avec succès! 📄', 'success');
        } catch (error) {
            console.error('PDF Export Error:', error);
            this.showToast('Erreur lors de l\'export PDF', 'error');
        }
    }

    async generatePDF(tasks, categories) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        let yPosition = 20;
        const pageWidth = doc.internal.pageSize.width;
        const pageHeight = doc.internal.pageSize.height;
        const margin = 20;
        const contentWidth = pageWidth - (margin * 2);

        // Header with gradient effect (simulated with rectangles)
        doc.setFillColor(91, 92, 240);
        doc.rect(0, 0, pageWidth, 40, 'F');

        // Title
        doc.setTextColor(255, 255, 255);
        doc.setFontSize(24);
        doc.setFont('helvetica', 'bold');
        doc.text('NEXA Task Board', margin, 25);

        // Date
        doc.setFontSize(10);
        doc.setFont('helvetica', 'normal');
        const dateStr = new Date().toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        doc.text(`Exporté le ${dateStr}`, margin, 35);

        yPosition = 55;

        // Statistics Section
        doc.setTextColor(0, 0, 0);
        doc.setFontSize(16);
        doc.setFont('helvetica', 'bold');
        doc.text('📊 Statistiques', margin, yPosition);

        yPosition += 10;

        const stats = {
            total: tasks.length,
            todo: tasks.filter(t => t.status === 'todo').length,
            doing: tasks.filter(t => t.status === 'doing').length,
            done: tasks.filter(t => t.status === 'done').length,
            high: tasks.filter(t => t.priority === 'high').length,
            med: tasks.filter(t => t.priority === 'med').length,
            low: tasks.filter(t => t.priority === 'low').length
        };

        // Stats boxes
        const boxWidth = (contentWidth - 20) / 4;
        const boxHeight = 25;

        // Total
        this.drawStatBox(doc, margin, yPosition, boxWidth, boxHeight, 'Total', stats.total, [91, 92, 240]);
        // Todo
        this.drawStatBox(doc, margin + boxWidth + 7, yPosition, boxWidth, boxHeight, 'À faire', stats.todo, [159, 122, 234]);
        // Doing
        this.drawStatBox(doc, margin + (boxWidth + 7) * 2, yPosition, boxWidth, boxHeight, 'En cours', stats.doing, [91, 92, 240]);
        // Done
        this.drawStatBox(doc, margin + (boxWidth + 7) * 3, yPosition, boxWidth, boxHeight, 'Terminé', stats.done, [16, 185, 129]);

        yPosition += boxHeight + 15;

        // Tasks by Status
        const statuses = [
            { key: 'todo', label: '📋 À faire', color: [159, 122, 234] },
            { key: 'doing', label: '⚡ En cours', color: [91, 92, 240] },
            { key: 'done', label: '✅ Terminé', color: [16, 185, 129] }
        ];

        for (const statusInfo of statuses) {
            const statusTasks = tasks.filter(t => t.status === statusInfo.key);

            if (statusTasks.length === 0) continue;

            // Check if we need a new page
            if (yPosition > pageHeight - 60) {
                doc.addPage();
                yPosition = 20;
            }

            // Status header
            doc.setFillColor(...statusInfo.color);
            doc.rect(margin, yPosition, contentWidth, 10, 'F');
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.text(statusInfo.label + ` (${statusTasks.length})`, margin + 5, yPosition + 7);

            yPosition += 15;

            // Tasks
            for (const task of statusTasks) {
                // Check if we need a new page
                if (yPosition > pageHeight - 40) {
                    doc.addPage();
                    yPosition = 20;
                }

                // Task card
                doc.setDrawColor(200, 200, 200);
                doc.setFillColor(250, 250, 250);
                doc.roundedRect(margin, yPosition, contentWidth, 25, 3, 3, 'FD');

                // Task title
                doc.setTextColor(0, 0, 0);
                doc.setFontSize(11);
                doc.setFont('helvetica', 'bold');
                const title = this.truncateText(doc, task.title || 'Sans titre', contentWidth - 60);
                doc.text(title, margin + 5, yPosition + 8);

                // Priority badge
                const priorityColors = {
                    high: [239, 68, 68],
                    med: [245, 158, 11],
                    low: [16, 185, 129]
                };
                const priorityLabels = {
                    high: 'Haute',
                    med: 'Moyenne',
                    low: 'Basse'
                };

                const priorityColor = priorityColors[task.priority] || [200, 200, 200];
                doc.setFillColor(...priorityColor);
                doc.roundedRect(pageWidth - margin - 35, yPosition + 3, 30, 6, 2, 2, 'F');
                doc.setTextColor(255, 255, 255);
                doc.setFontSize(8);
                doc.setFont('helvetica', 'bold');
                doc.text(priorityLabels[task.priority] || 'N/A', pageWidth - margin - 32, yPosition + 7.5);

                // Description
                if (task.description) {
                    doc.setTextColor(100, 100, 100);
                    doc.setFontSize(9);
                    doc.setFont('helvetica', 'normal');
                    const desc = this.truncateText(doc, task.description, contentWidth - 10);
                    doc.text(desc, margin + 5, yPosition + 15);
                }

                // Due date
                if (task.dueAt) {
                    doc.setTextColor(150, 150, 150);
                    doc.setFontSize(8);
                    const dueDate = new Date(task.dueAt).toLocaleDateString('fr-FR');
                    doc.text(`📅 ${dueDate}`, margin + 5, yPosition + 21);
                }

                yPosition += 30;
            }

            yPosition += 5;
        }

        // Footer on last page
        const totalPages = doc.internal.pages.length - 1;
        for (let i = 1; i <= totalPages; i++) {
            doc.setPage(i);
            doc.setTextColor(150, 150, 150);
            doc.setFontSize(8);
            doc.text(
                `Page ${i} / ${totalPages} - NEXA Task Hub`,
                pageWidth / 2,
                pageHeight - 10,
                { align: 'center' }
            );
        }

        // Save PDF
        const filename = `nexa-tasks-${new Date().getTime()}.pdf`;
        doc.save(filename);
    }

    drawStatBox(doc, x, y, width, height, label, value, color) {
        // Box background with light color (simulated with standard fillColor for compatibility)
        doc.setFillColor(245, 245, 250); // Light gray background
        doc.setDrawColor(...color);
        doc.setLineWidth(0.5);
        doc.roundedRect(x, y, width, height, 3, 3, 'FD');

        // Value
        doc.setTextColor(...color);
        doc.setFontSize(18);
        doc.setFont('helvetica', 'bold');
        doc.text(value.toString(), x + width / 2, y + 12, { align: 'center' });

        // Label
        doc.setFontSize(9);
        doc.setFont('helvetica', 'normal');
        doc.text(label, x + width / 2, y + 20, { align: 'center' });
    }

    truncateText(doc, text, maxWidth) {
        const textWidth = doc.getTextWidth(text);
        if (textWidth <= maxWidth) return text;

        let truncated = text;
        while (doc.getTextWidth(truncated + '...') > maxWidth && truncated.length > 0) {
            truncated = truncated.slice(0, -1);
        }
        return truncated + '...';
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

// Replace the old PDF exporter
window.pdfExporter = new AdvancedPDFExporter();

console.log("✅ Advanced PDF Exporter Ready!");
