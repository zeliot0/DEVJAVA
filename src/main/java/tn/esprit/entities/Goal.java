package tn.esprit.entities;

import java.time.LocalDate;

public class Goal {

    private int idG;
    private String titleGoa;
    private String descriptionGoa;
    private LocalDate dateDebutGoa;
    private LocalDate dateFinalGoa;
    private String statusGoa;
    private Double progressGoa;
    private String categoryGoa;
    private String priorityGoa;
    private String notesGoa;
    private String colorGoa;

    public Goal() {
    }

    public Goal(String titleGoa, String descriptionGoa, LocalDate dateDebutGoa, LocalDate dateFinalGoa,
                String statusGoa, Double progressGoa, String categoryGoa, String priorityGoa,
                String notesGoa, String colorGoa) {
        this.titleGoa = titleGoa;
        this.descriptionGoa = descriptionGoa;
        this.dateDebutGoa = dateDebutGoa;
        this.dateFinalGoa = dateFinalGoa;
        this.statusGoa = statusGoa;
        this.progressGoa = progressGoa;
        this.categoryGoa = categoryGoa;
        this.priorityGoa = priorityGoa;
        this.notesGoa = notesGoa;
        this.colorGoa = colorGoa;
    }

    public int getIdG() {
        return idG;
    }

    public void setIdG(int idG) {
        this.idG = idG;
    }

    public String getTitleGoa() {
        return titleGoa;
    }

    public void setTitleGoa(String titleGoa) {
        this.titleGoa = titleGoa;
    }

    public String getDescriptionGoa() {
        return descriptionGoa;
    }

    public void setDescriptionGoa(String descriptionGoa) {
        this.descriptionGoa = descriptionGoa;
    }

    public LocalDate getDateDebutGoa() {
        return dateDebutGoa;
    }

    public void setDateDebutGoa(LocalDate dateDebutGoa) {
        this.dateDebutGoa = dateDebutGoa;
    }

    public LocalDate getDateFinalGoa() {
        return dateFinalGoa;
    }

    public void setDateFinalGoa(LocalDate dateFinalGoa) {
        this.dateFinalGoa = dateFinalGoa;
    }

    public String getStatusGoa() {
        return statusGoa;
    }

    public void setStatusGoa(String statusGoa) {
        this.statusGoa = statusGoa;
    }

    public Double getProgressGoa() {
        return progressGoa;
    }

    public void setProgressGoa(Double progressGoa) {
        this.progressGoa = progressGoa;
    }

    public String getCategoryGoa() {
        return categoryGoa;
    }

    public void setCategoryGoa(String categoryGoa) {
        this.categoryGoa = categoryGoa;
    }

    public String getPriorityGoa() {
        return priorityGoa;
    }

    public void setPriorityGoa(String priorityGoa) {
        this.priorityGoa = priorityGoa;
    }

    public String getNotesGoa() {
        return notesGoa;
    }

    public void setNotesGoa(String notesGoa) {
        this.notesGoa = notesGoa;
    }

    public String getColorGoa() {
        return colorGoa;
    }

    public void setColorGoa(String colorGoa) {
        this.colorGoa = colorGoa;
    }

    @Override
    public String toString() {
        return titleGoa;
    }
}
