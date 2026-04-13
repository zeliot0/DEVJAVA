package tn.esprit.entities;

import java.time.LocalDateTime;

public class Milestone {

    private int idM;
    private String titleMilestone;
    private String descriptionMilestone;
    private LocalDateTime dueDate;
    private LocalDateTime completedDate;
    private LocalDateTime createdAt;
    private int goalId;

    public Milestone() {
    }

    public Milestone(String titleMilestone, String descriptionMilestone, LocalDateTime dueDate,
                     LocalDateTime completedDate, LocalDateTime createdAt, int goalId) {
        this.titleMilestone = titleMilestone;
        this.descriptionMilestone = descriptionMilestone;
        this.dueDate = dueDate;
        this.completedDate = completedDate;
        this.createdAt = createdAt;
        this.goalId = goalId;
    }

    public int getIdM() {
        return idM;
    }

    public void setIdM(int idM) {
        this.idM = idM;
    }

    public String getTitleMilestone() {
        return titleMilestone;
    }

    public void setTitleMilestone(String titleMilestone) {
        this.titleMilestone = titleMilestone;
    }

    public String getDescriptionMilestone() {
        return descriptionMilestone;
    }

    public void setDescriptionMilestone(String descriptionMilestone) {
        this.descriptionMilestone = descriptionMilestone;
    }

    public LocalDateTime getDueDate() {
        return dueDate;
    }

    public void setDueDate(LocalDateTime dueDate) {
        this.dueDate = dueDate;
    }

    public LocalDateTime getCompletedDate() {
        return completedDate;
    }

    public void setCompletedDate(LocalDateTime completedDate) {
        this.completedDate = completedDate;
    }

    public LocalDateTime getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(LocalDateTime createdAt) {
        this.createdAt = createdAt;
    }

    public int getGoalId() {
        return goalId;
    }

    public void setGoalId(int goalId) {
        this.goalId = goalId;
    }

    @Override
    public String toString() {
        return titleMilestone;
    }
}
