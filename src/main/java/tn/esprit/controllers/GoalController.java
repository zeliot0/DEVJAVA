package tn.esprit.controllers;

import javafx.beans.property.ReadOnlyObjectWrapper;
import javafx.beans.property.ReadOnlyStringWrapper;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.CheckBox;
import javafx.scene.control.ColorPicker;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.scene.control.TextInputControl;
import javafx.scene.paint.Color;
import tn.esprit.entities.Goal;
import tn.esprit.entities.Milestone;
import tn.esprit.services.GoalService;
import tn.esprit.services.MilestoneService;

import java.sql.SQLException;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class GoalController {

    @FXML
    private Label lblTotalGoals;
    @FXML
    private Label lblActiveGoals;
    @FXML
    private Label lblCompletedGoals;
    @FXML
    private Label lblAverageProgress;

    @FXML
    private TextField tfId;
    @FXML
    private TextField tfTitle;
    @FXML
    private TextArea taDescription;
    @FXML
    private DatePicker dpStartDate;
    @FXML
    private DatePicker dpEndDate;
    @FXML
    private ComboBox<String> cbStatus;
    @FXML
    private TextField tfProgress;
    @FXML
    private TextField tfCategory;
    @FXML
    private ComboBox<String> cbPriority;
    @FXML
    private TextArea taNotes;
    @FXML
    private ColorPicker colorPicker;

    @FXML
    private TableView<Goal> tableGoals;
    @FXML
    private TableColumn<Goal, Integer> colId;
    @FXML
    private TableColumn<Goal, String> colTitle;
    @FXML
    private TableColumn<Goal, String> colStatus;
    @FXML
    private TableColumn<Goal, String> colProgress;
    @FXML
    private TableColumn<Goal, String> colCategory;
    @FXML
    private TableColumn<Goal, String> colPriority;
    @FXML
    private TableColumn<Goal, String> colStartDate;
    @FXML
    private TableColumn<Goal, String> colEndDate;

    @FXML
    private Label lblSelectedGoal;
    @FXML
    private TextField tfMilestoneId;
    @FXML
    private TextField tfMilestoneTitle;
    @FXML
    private TextArea taMilestoneDescription;
    @FXML
    private DatePicker dpMilestoneDueDate;
    @FXML
    private CheckBox chkMilestoneCompleted;
    @FXML
    private TableView<Milestone> tableMilestones;
    @FXML
    private TableColumn<Milestone, Integer> colMilestoneId;
    @FXML
    private TableColumn<Milestone, String> colMilestoneTitle;
    @FXML
    private TableColumn<Milestone, String> colMilestoneDescription;
    @FXML
    private TableColumn<Milestone, String> colMilestoneDueDate;
    @FXML
    private TableColumn<Milestone, String> colMilestoneCompleted;

    @FXML
    private TextField tfSearchGoal;
    @FXML
    private ComboBox<String> cbFilterStatus;
    @FXML
    private ComboBox<String> cbFilterPriority;
    @FXML
    private ComboBox<String> cbFilterCategory;

    private GoalService goalService;
    private MilestoneService milestoneService;
    private Goal selectedGoal;
    private Milestone selectedMilestone;
    private final ObservableList<Goal> masterGoals = FXCollections.observableArrayList();

    @FXML
    public void initialize() {
        cbStatus.setItems(FXCollections.observableArrayList(
                "BROUILLON", "PLANIFIE", "EN_COURS", "TERMINE", "ANNULE"
        ));
        cbPriority.setItems(FXCollections.observableArrayList(
                "BASSE", "MOYENNE", "HAUTE"
        ));
        cbFilterStatus.setItems(FXCollections.observableArrayList(
                "ALL", "BROUILLON", "PLANIFIE", "EN_COURS", "TERMINE", "ANNULE"
        ));
        cbFilterPriority.setItems(FXCollections.observableArrayList(
                "ALL", "BASSE", "MOYENNE", "HAUTE"
        ));
        cbFilterStatus.setValue("ALL");
        cbFilterPriority.setValue("ALL");
        cbFilterCategory.setItems(FXCollections.observableArrayList("ALL"));
        cbFilterCategory.setValue("ALL");

        colorPicker.setValue(Color.web("#6c63ff"));
        configureInputValidation();
        initGoalTable();
        initMilestoneTable();
        resetMilestoneContext();

        try {
            goalService = new GoalService();
            milestoneService = new MilestoneService();
            loadGoals();
            setMilestoneControlsDisabled(true);
        } catch (RuntimeException e) {
            showError("Database unavailable", e.getMessage());
            setFormDisabled(true);
        }

        tableGoals.getSelectionModel().selectedItemProperty().addListener((obs, oldValue, newValue) -> {
            if (newValue != null) {
                selectedGoal = newValue;
                fillGoalForm(newValue);
                setMilestoneControlsDisabled(false);
                clearMilestoneForm();
                loadMilestonesForGoal(newValue.getIdG());
                lblSelectedGoal.setText("Milestones for: " + safe(newValue.getTitleGoa()));
            } else if (tableGoals.getSelectionModel().isEmpty()) {
                resetMilestoneContext();
            }
        });

        tableMilestones.getSelectionModel().selectedItemProperty().addListener((obs, oldValue, newValue) -> {
            selectedMilestone = newValue;
            if (newValue != null) {
                fillMilestoneForm(newValue);
            }
        });

        tfSearchGoal.textProperty().addListener((obs, oldValue, newValue) -> applyFilters());
        cbFilterStatus.valueProperty().addListener((obs, oldValue, newValue) -> applyFilters());
        cbFilterPriority.valueProperty().addListener((obs, oldValue, newValue) -> applyFilters());
        cbFilterCategory.valueProperty().addListener((obs, oldValue, newValue) -> applyFilters());
    }

    private void initGoalTable() {
        colId.setCellValueFactory(data -> new ReadOnlyObjectWrapper<>(data.getValue().getIdG()));
        colTitle.setCellValueFactory(data -> new ReadOnlyStringWrapper(safe(data.getValue().getTitleGoa())));
        colStatus.setCellValueFactory(data -> new ReadOnlyStringWrapper(safe(data.getValue().getStatusGoa())));
        colProgress.setCellValueFactory(data -> new ReadOnlyStringWrapper(
                data.getValue().getProgressGoa() == null ? "0 %" : String.format("%.1f %%", data.getValue().getProgressGoa())
        ));
        colCategory.setCellValueFactory(data -> new ReadOnlyStringWrapper(safe(data.getValue().getCategoryGoa())));
        colPriority.setCellValueFactory(data -> new ReadOnlyStringWrapper(safe(data.getValue().getPriorityGoa())));
        colStartDate.setCellValueFactory(data -> new ReadOnlyStringWrapper(
                data.getValue().getDateDebutGoa() == null ? "" : data.getValue().getDateDebutGoa().toString()
        ));
        colEndDate.setCellValueFactory(data -> new ReadOnlyStringWrapper(
                data.getValue().getDateFinalGoa() == null ? "" : data.getValue().getDateFinalGoa().toString()
        ));
    }

    private void initMilestoneTable() {
        colMilestoneId.setCellValueFactory(data -> new ReadOnlyObjectWrapper<>(data.getValue().getIdM()));
        colMilestoneTitle.setCellValueFactory(
                data -> new ReadOnlyStringWrapper(safe(data.getValue().getTitleMilestone()))
        );
        colMilestoneDescription.setCellValueFactory(
                data -> new ReadOnlyStringWrapper(safe(data.getValue().getDescriptionMilestone()))
        );
        colMilestoneDueDate.setCellValueFactory(data -> new ReadOnlyStringWrapper(
                data.getValue().getDueDate() == null ? "" : data.getValue().getDueDate().toLocalDate().toString()
        ));
        colMilestoneCompleted.setCellValueFactory(data -> new ReadOnlyStringWrapper(
                data.getValue().getCompletedDate() == null ? "No" : "Yes"
        ));
    }

    @FXML
    public void addGoal() {
        if (!ensureGoalServiceReady()) {
            return;
        }
        try {
            Goal goal = buildGoalFromForm(false);
            goalService.add(goal);
            showInfo("Success", "Goal added successfully.");
            clearGoalForm();
            loadGoals();
        } catch (SQLException e) {
            showError("Database error", e.getMessage());
        } catch (Exception e) {
            showError("Validation error", e.getMessage());
        }
    }

    @FXML
    public void updateGoal() {
        if (!ensureGoalServiceReady()) {
            return;
        }
        try {
            Goal goal = buildGoalFromForm(true);
            goalService.update(goal);
            showInfo("Success", "Goal updated successfully.");
            loadGoals();
            restoreGoalSelection(goal.getIdG());
        } catch (Exception e) {
            showError("Update error", e.getMessage());
        }
    }

    @FXML
    public void deleteGoal() {
        if (!ensureGoalServiceReady()) {
            return;
        }

        Goal goalToDelete = tableGoals.getSelectionModel().getSelectedItem();
        if (goalToDelete == null) {
            showError("Selection required", "Please select a goal to delete.");
            return;
        }

        try {
            goalService.delete(goalToDelete);
            showInfo("Success", "Goal deleted successfully.");
            clearGoalForm();
            loadGoals();
        } catch (Exception e) {
            showError("Delete error", e.getMessage());
        }
    }

    @FXML
    public void clearGoalForm() {
        tfId.clear();
        tfTitle.clear();
        taDescription.clear();
        dpStartDate.setValue(null);
        dpEndDate.setValue(null);
        cbStatus.setValue(null);
        tfProgress.clear();
        tfCategory.clear();
        cbPriority.setValue(null);
        taNotes.clear();
        colorPicker.setValue(Color.web("#6c63ff"));
        tableGoals.getSelectionModel().clearSelection();
        resetMilestoneContext();
    }

    @FXML
    public void refreshGoals() {
        if (!ensureGoalServiceReady()) {
            return;
        }

        Integer selectedGoalId = selectedGoal == null ? null : selectedGoal.getIdG();
        loadGoals();

        if (selectedGoalId != null) {
            restoreGoalSelection(selectedGoalId);
        }
    }

    @FXML
    public void resetFilters() {
        tfSearchGoal.clear();
        cbFilterStatus.setValue("ALL");
        cbFilterPriority.setValue("ALL");
        cbFilterCategory.setValue("ALL");
        applyFilters();
    }

    private void loadGoals() {
        List<Goal> goals = goalService.getAll();
        masterGoals.setAll(goals);
        refreshCategoryFilter(goals);
        applyFilters();
    }

    private void refreshCategoryFilter(List<Goal> goals) {
        List<String> categories = new ArrayList<>();
        categories.add("ALL");

        for (Goal goal : goals) {
            String category = safe(goal.getCategoryGoa()).trim();
            if (!category.isEmpty() && !categories.contains(category)) {
                categories.add(category);
            }
        }

        String previousValue = cbFilterCategory.getValue();
        cbFilterCategory.setItems(FXCollections.observableArrayList(categories));
        if (previousValue != null && categories.contains(previousValue)) {
            cbFilterCategory.setValue(previousValue);
        } else {
            cbFilterCategory.setValue("ALL");
        }
    }

    private void applyFilters() {
        String search = textOf(tfSearchGoal).toLowerCase();
        String status = cbFilterStatus.getValue() == null ? "ALL" : cbFilterStatus.getValue();
        String priority = cbFilterPriority.getValue() == null ? "ALL" : cbFilterPriority.getValue();
        String category = cbFilterCategory.getValue() == null ? "ALL" : cbFilterCategory.getValue();

        List<Goal> filtered = new ArrayList<>();
        for (Goal goal : masterGoals) {
            boolean matchesSearch =
                    safe(goal.getTitleGoa()).toLowerCase().contains(search)
                            || safe(goal.getDescriptionGoa()).toLowerCase().contains(search)
                            || safe(goal.getCategoryGoa()).toLowerCase().contains(search)
                            || safe(goal.getPriorityGoa()).toLowerCase().contains(search)
                            || safe(goal.getStatusGoa()).toLowerCase().contains(search);

            boolean matchesStatus = "ALL".equals(status) || safe(goal.getStatusGoa()).equalsIgnoreCase(status);
            boolean matchesPriority = "ALL".equals(priority) || safe(goal.getPriorityGoa()).equalsIgnoreCase(priority);
            boolean matchesCategory = "ALL".equals(category) || safe(goal.getCategoryGoa()).equalsIgnoreCase(category);

            if (matchesSearch && matchesStatus && matchesPriority && matchesCategory) {
                filtered.add(goal);
            }
        }

        tableGoals.setItems(FXCollections.observableArrayList(filtered));
        updateStats(filtered);
        syncSelectionAfterFilter(filtered);
    }

    private void syncSelectionAfterFilter(List<Goal> filteredGoals) {
        if (selectedGoal == null) {
            return;
        }

        for (Goal goal : filteredGoals) {
            if (goal.getIdG() == selectedGoal.getIdG()) {
                tableGoals.getSelectionModel().select(goal);
                return;
            }
        }

        tableGoals.getSelectionModel().clearSelection();
        resetMilestoneContext();
    }

    private void updateStats(List<Goal> goals) {
        int total = goals.size();
        int active = 0;
        int completed = 0;
        double sumProgress = 0;

        for (Goal goal : goals) {
            String status = safe(goal.getStatusGoa()).toUpperCase();

            if ("EN_COURS".equals(status) || "PLANIFIE".equals(status) || "BROUILLON".equals(status)) {
                active++;
            }
            if ("TERMINE".equals(status)) {
                completed++;
            }
            if (goal.getProgressGoa() != null) {
                sumProgress += goal.getProgressGoa();
            }
        }

        double average = total == 0 ? 0 : sumProgress / total;

        lblTotalGoals.setText(String.valueOf(total));
        lblActiveGoals.setText(String.valueOf(active));
        lblCompletedGoals.setText(String.valueOf(completed));
        lblAverageProgress.setText(String.format("%.1f %%", average));
    }

    private Goal buildGoalFromForm(boolean requireId) {
        String title = textOf(tfTitle);
        String description = textOf(taDescription);
        String category = textOf(tfCategory);
        String status = cbStatus.getValue();
        String priority = cbPriority.getValue();
        String notes = textOf(taNotes);
        LocalDate startDate = dpStartDate.getValue();
        LocalDate endDate = dpEndDate.getValue();
        Double progress = parseProgress(tfProgress.getText());

        validateGoalForm(title, description, category, status, priority, notes, startDate, endDate, progress);

        Goal goal = new Goal();
        if (requireId) {
            if (textOf(tfId).isEmpty()) {
                throw new IllegalArgumentException("ID is required for update.");
            }
            goal.setIdG(Integer.parseInt(textOf(tfId)));
        }

        goal.setTitleGoa(title);
        goal.setDescriptionGoa(description);
        goal.setDateDebutGoa(startDate);
        goal.setDateFinalGoa(endDate);
        goal.setStatusGoa(status);
        goal.setProgressGoa(progress);
        goal.setCategoryGoa(category);
        goal.setPriorityGoa(priority);
        goal.setNotesGoa(notes);
        goal.setColorGoa(toHex(colorPicker.getValue()));
        return goal;
    }

    private void validateGoalForm(String title, String description, String category, String status, String priority,
                                  String notes, LocalDate startDate, LocalDate endDate, Double progress) {
        if (title.isEmpty()) {
            throw new IllegalArgumentException("Title is required.");
        }
        if (title.length() < 3) {
            throw new IllegalArgumentException("Title must contain at least 3 characters.");
        }
        if (title.length() > 255) {
            throw new IllegalArgumentException("Title must not exceed 255 characters.");
        }
        if (description.isEmpty()) {
            throw new IllegalArgumentException("Description is required.");
        }
        if (description.length() < 10) {
            throw new IllegalArgumentException("Description must contain at least 10 characters.");
        }
        if (startDate == null) {
            throw new IllegalArgumentException("Start date is required.");
        }
        if (endDate == null) {
            throw new IllegalArgumentException("End date is required.");
        }
        if (endDate.isBefore(startDate)) {
            throw new IllegalArgumentException("End date must be after or equal to start date.");
        }
        if (status == null || status.isBlank()) {
            throw new IllegalArgumentException("Status is required.");
        }
        if (category.isEmpty()) {
            throw new IllegalArgumentException("Category is required.");
        }
        if (category.length() < 3) {
            throw new IllegalArgumentException("Category must contain at least 3 characters.");
        }
        if (category.length() > 120) {
            throw new IllegalArgumentException("Category must not exceed 120 characters.");
        }
        if (priority == null || priority.isBlank()) {
            throw new IllegalArgumentException("Priority is required.");
        }
        if (notes.length() > 500) {
            throw new IllegalArgumentException("Notes must not exceed 500 characters.");
        }
        if ("TERMINE".equals(status) && progress < 100) {
            throw new IllegalArgumentException("A completed goal must have 100% progress.");
        }
        if (("BROUILLON".equals(status) || "PLANIFIE".equals(status)) && progress > 0) {
            throw new IllegalArgumentException("Draft or planned goals must have 0% progress.");
        }
    }

    private Double parseProgress(String text) {
        if (text == null || text.trim().isEmpty()) {
            return 0.0;
        }

        try {
            double value = Double.parseDouble(text.trim());
            if (value < 0 || value > 100) {
                throw new IllegalArgumentException("Progress must be between 0 and 100.");
            }
            return value;
        } catch (NumberFormatException e) {
            throw new IllegalArgumentException("Progress must be a number.");
        }
    }

    private void fillGoalForm(Goal goal) {
        tfId.setText(String.valueOf(goal.getIdG()));
        tfTitle.setText(goal.getTitleGoa());
        taDescription.setText(goal.getDescriptionGoa());
        dpStartDate.setValue(goal.getDateDebutGoa());
        dpEndDate.setValue(goal.getDateFinalGoa());
        cbStatus.setValue(goal.getStatusGoa());
        tfProgress.setText(goal.getProgressGoa() == null ? "" : String.valueOf(goal.getProgressGoa()));
        tfCategory.setText(goal.getCategoryGoa());
        cbPriority.setValue(goal.getPriorityGoa());
        taNotes.setText(goal.getNotesGoa());

        try {
            if (goal.getColorGoa() != null && !goal.getColorGoa().isBlank()) {
                colorPicker.setValue(Color.web(goal.getColorGoa()));
            } else {
                colorPicker.setValue(Color.web("#6c63ff"));
            }
        } catch (Exception ignored) {
            colorPicker.setValue(Color.web("#6c63ff"));
        }
    }

    @FXML
    public void addMilestone() {
        if (!ensureMilestoneContextReady()) {
            return;
        }

        try {
            Milestone milestone = buildMilestoneFromForm(false);
            milestone.setGoalId(selectedGoal.getIdG());
            milestone.setCreatedAt(LocalDateTime.now());
            milestone.setCompletedDate(chkMilestoneCompleted.isSelected() ? LocalDateTime.now() : null);

            milestoneService.add(milestone);
            showInfo("Success", "Milestone added successfully.");
            clearMilestoneForm();
            loadMilestonesForGoal(selectedGoal.getIdG());
        } catch (SQLException e) {
            showError("Database error", e.getMessage());
        } catch (Exception e) {
            showError("Milestone add error", e.getMessage());
        }
    }

    @FXML
    public void updateMilestone() {
        if (!ensureMilestoneContextReady()) {
            return;
        }

        try {
            Milestone milestone = buildMilestoneFromForm(true);
            milestone.setGoalId(selectedGoal.getIdG());

            LocalDateTime createdAt = selectedMilestone != null && selectedMilestone.getCreatedAt() != null
                    ? selectedMilestone.getCreatedAt()
                    : LocalDateTime.now();
            milestone.setCreatedAt(createdAt);
            milestone.setCompletedDate(chkMilestoneCompleted.isSelected() ? LocalDateTime.now() : null);

            milestoneService.update(milestone);
            showInfo("Success", "Milestone updated successfully.");
            clearMilestoneForm();
            loadMilestonesForGoal(selectedGoal.getIdG());
        } catch (Exception e) {
            showError("Milestone update error", e.getMessage());
        }
    }

    @FXML
    public void deleteMilestone() {
        if (!ensureMilestoneServiceReady()) {
            return;
        }

        Milestone milestoneToDelete = tableMilestones.getSelectionModel().getSelectedItem();
        if (milestoneToDelete == null) {
            showError("Selection required", "Please select a milestone to delete.");
            return;
        }

        try {
            milestoneService.delete(milestoneToDelete);
            showInfo("Success", "Milestone deleted successfully.");
            clearMilestoneForm();
            if (selectedGoal != null) {
                loadMilestonesForGoal(selectedGoal.getIdG());
            }
        } catch (Exception e) {
            showError("Milestone delete error", e.getMessage());
        }
    }

    @FXML
    public void clearMilestoneForm() {
        tfMilestoneId.clear();
        tfMilestoneTitle.clear();
        taMilestoneDescription.clear();
        dpMilestoneDueDate.setValue(null);
        chkMilestoneCompleted.setSelected(false);
        selectedMilestone = null;
        tableMilestones.getSelectionModel().clearSelection();
    }

    private Milestone buildMilestoneFromForm(boolean requireId) {
        String title = textOf(tfMilestoneTitle);
        String description = textOf(taMilestoneDescription);
        LocalDate dueDate = dpMilestoneDueDate.getValue();

        validateMilestoneForm(title, description, dueDate);

        Milestone milestone = new Milestone();
        if (requireId) {
            if (textOf(tfMilestoneId).isEmpty()) {
                throw new IllegalArgumentException("Milestone ID is required for update.");
            }
            milestone.setIdM(Integer.parseInt(textOf(tfMilestoneId)));
        }

        milestone.setTitleMilestone(title);
        milestone.setDescriptionMilestone(description);
        milestone.setDueDate(dueDate.atStartOfDay());
        return milestone;
    }

    private void validateMilestoneForm(String title, String description, LocalDate dueDate) {
        if (selectedGoal == null) {
            throw new IllegalArgumentException("Select a goal before managing milestones.");
        }
        if (title.isEmpty()) {
            throw new IllegalArgumentException("Milestone title is required.");
        }
        if (title.length() < 3) {
            throw new IllegalArgumentException("Milestone title must contain at least 3 characters.");
        }
        if (title.length() > 255) {
            throw new IllegalArgumentException("Milestone title must not exceed 255 characters.");
        }
        if (description.isEmpty()) {
            throw new IllegalArgumentException("Milestone description is required.");
        }
        if (description.length() < 5) {
            throw new IllegalArgumentException("Milestone description must contain at least 5 characters.");
        }
        if (description.length() > 1000) {
            throw new IllegalArgumentException("Milestone description must not exceed 1000 characters.");
        }
        if (dueDate == null) {
            throw new IllegalArgumentException("Milestone due date is required.");
        }
        if (selectedGoal.getDateDebutGoa() != null && dueDate.isBefore(selectedGoal.getDateDebutGoa())) {
            throw new IllegalArgumentException("Milestone due date cannot be before the goal start date.");
        }
        if (selectedGoal.getDateFinalGoa() != null && dueDate.isAfter(selectedGoal.getDateFinalGoa())) {
            throw new IllegalArgumentException("Milestone due date cannot be after the goal end date.");
        }
    }

    private void loadMilestonesForGoal(int goalId) {
        if (!ensureMilestoneServiceReady()) {
            return;
        }

        List<Milestone> milestones = milestoneService.getByGoalId(goalId);
        tableMilestones.setItems(FXCollections.observableArrayList(milestones));
    }

    private void fillMilestoneForm(Milestone milestone) {
        tfMilestoneId.setText(String.valueOf(milestone.getIdM()));
        tfMilestoneTitle.setText(milestone.getTitleMilestone());
        taMilestoneDescription.setText(milestone.getDescriptionMilestone());
        dpMilestoneDueDate.setValue(milestone.getDueDate() == null ? null : milestone.getDueDate().toLocalDate());
        chkMilestoneCompleted.setSelected(milestone.getCompletedDate() != null);
    }

    private void configureInputValidation() {
        tfProgress.textProperty().addListener((obs, oldValue, newValue) -> {
            if (newValue == null) {
                return;
            }
            if (!newValue.matches("\\d{0,3}(\\.\\d{0,2})?")) {
                tfProgress.setText(oldValue);
            }
        });

        limitTextLength(tfTitle, 255);
        limitTextLength(tfCategory, 120);
        limitTextLength(taDescription, 1000);
        limitTextLength(taNotes, 500);
        limitTextLength(tfMilestoneTitle, 255);
        limitTextLength(taMilestoneDescription, 1000);
        limitTextLength(tfSearchGoal, 255);
    }

    private void limitTextLength(TextInputControl control, int maxLength) {
        control.textProperty().addListener((obs, oldValue, newValue) -> {
            if (newValue != null && newValue.length() > maxLength) {
                control.setText(oldValue);
            }
        });
    }

    private void resetMilestoneContext() {
        selectedGoal = null;
        lblSelectedGoal.setText("Milestones for: no goal selected");
        clearMilestoneForm();
        tableMilestones.setItems(FXCollections.observableArrayList());
        setMilestoneControlsDisabled(true);
    }

    private void restoreGoalSelection(int goalId) {
        for (Goal goal : tableGoals.getItems()) {
            if (goal.getIdG() == goalId) {
                tableGoals.getSelectionModel().select(goal);
                tableGoals.scrollTo(goal);
                return;
            }
        }

        resetMilestoneContext();
    }

    private boolean ensureGoalServiceReady() {
        if (goalService == null) {
            showError("Database unavailable", "Configure MySQL and db.properties before using the dashboard.");
            return false;
        }
        return true;
    }

    private boolean ensureMilestoneServiceReady() {
        if (milestoneService == null) {
            showError("Database unavailable", "Configure MySQL and db.properties before using milestones.");
            return false;
        }
        return true;
    }

    private boolean ensureMilestoneContextReady() {
        if (!ensureMilestoneServiceReady()) {
            return false;
        }
        if (selectedGoal == null) {
            showError("Goal required", "Select a goal before managing milestones.");
            return false;
        }
        return true;
    }

    private void setFormDisabled(boolean disabled) {
        tfId.setDisable(disabled);
        tfTitle.setDisable(disabled);
        taDescription.setDisable(disabled);
        dpStartDate.setDisable(disabled);
        dpEndDate.setDisable(disabled);
        cbStatus.setDisable(disabled);
        tfProgress.setDisable(disabled);
        tfCategory.setDisable(disabled);
        cbPriority.setDisable(disabled);
        taNotes.setDisable(disabled);
        colorPicker.setDisable(disabled);
        tfSearchGoal.setDisable(disabled);
        cbFilterStatus.setDisable(disabled);
        cbFilterPriority.setDisable(disabled);
        cbFilterCategory.setDisable(disabled);
        tableGoals.setDisable(disabled);
        setMilestoneControlsDisabled(disabled);
        tableMilestones.setDisable(disabled);
    }

    private void setMilestoneControlsDisabled(boolean disabled) {
        tfMilestoneId.setDisable(disabled);
        tfMilestoneTitle.setDisable(disabled);
        taMilestoneDescription.setDisable(disabled);
        dpMilestoneDueDate.setDisable(disabled);
        chkMilestoneCompleted.setDisable(disabled);
        tableMilestones.setDisable(disabled);
    }

    private String textOf(TextInputControl control) {
        return control.getText() == null ? "" : control.getText().trim();
    }

    private String safe(String value) {
        return value == null ? "" : value;
    }

    private String toHex(Color color) {
        return String.format(
                "#%02X%02X%02X",
                (int) Math.round(color.getRed() * 255),
                (int) Math.round(color.getGreen() * 255),
                (int) Math.round(color.getBlue() * 255)
        );
    }

    private void showInfo(String title, String content) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }

    private void showError(String title, String content) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }
}
