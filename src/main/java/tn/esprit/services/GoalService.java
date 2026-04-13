package tn.esprit.services;

import tn.esprit.entities.Goal;
import tn.esprit.tools.MyDataBase;

import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Types;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;

public class GoalService implements IGoalService<Goal> {

    private final Connection cnx;

    public GoalService() {
        cnx = MyDataBase.getInstance().getCnx();
    }

    @Override
    public void add(Goal goal) throws SQLException {
        validateGoal(goal);
        String req = "INSERT INTO goal "
                + "(title_goa, description_goa, date_debut_goa, date_final_goa, status_goa, progress_goa, category_goa, priority_goa, notes_goa, color_goa) "
                + "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try (PreparedStatement ps = cnx.prepareStatement(req, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, goal.getTitleGoa());
            ps.setString(2, goal.getDescriptionGoa());
            setDate(ps, 3, goal.getDateDebutGoa());
            setDate(ps, 4, goal.getDateFinalGoa());
            ps.setString(5, goal.getStatusGoa());

            if (goal.getProgressGoa() == null) {
                ps.setNull(6, Types.DOUBLE);
            } else {
                ps.setDouble(6, goal.getProgressGoa());
            }

            ps.setString(7, goal.getCategoryGoa());
            ps.setString(8, goal.getPriorityGoa());
            ps.setString(9, goal.getNotesGoa());
            ps.setString(10, goal.getColorGoa());

            ps.executeUpdate();

            try (ResultSet rs = ps.getGeneratedKeys()) {
                if (rs.next()) {
                    goal.setIdG(rs.getInt(1));
                }
            }
        }
    }

    @Override
    public void update(Goal goal) {
        validateGoal(goal);
        String req = "UPDATE goal SET title_goa=?, description_goa=?, date_debut_goa=?, date_final_goa=?, "
                + "status_goa=?, progress_goa=?, category_goa=?, priority_goa=?, notes_goa=?, color_goa=? "
                + "WHERE id_g=?";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setString(1, goal.getTitleGoa());
            ps.setString(2, goal.getDescriptionGoa());
            setDate(ps, 3, goal.getDateDebutGoa());
            setDate(ps, 4, goal.getDateFinalGoa());
            ps.setString(5, goal.getStatusGoa());

            if (goal.getProgressGoa() == null) {
                ps.setNull(6, Types.DOUBLE);
            } else {
                ps.setDouble(6, goal.getProgressGoa());
            }

            ps.setString(7, goal.getCategoryGoa());
            ps.setString(8, goal.getPriorityGoa());
            ps.setString(9, goal.getNotesGoa());
            ps.setString(10, goal.getColorGoa());
            ps.setInt(11, goal.getIdG());

            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Update failed: " + e.getMessage(), e);
        }
    }

    @Override
    public void delete(Goal goal) {
        try {
            cnx.setAutoCommit(false);

            try (PreparedStatement psMilestones = cnx.prepareStatement("DELETE FROM milestones WHERE goal_id=?");
                 PreparedStatement psGoal = cnx.prepareStatement("DELETE FROM goal WHERE id_g=?")) {

                psMilestones.setInt(1, goal.getIdG());
                psMilestones.executeUpdate();

                psGoal.setInt(1, goal.getIdG());
                psGoal.executeUpdate();

                cnx.commit();
            } catch (SQLException e) {
                cnx.rollback();
                throw e;
            } finally {
                cnx.setAutoCommit(true);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Delete failed: " + e.getMessage(), e);
        }
    }

    @Override
    public List<Goal> getAll() {
        List<Goal> goals = new ArrayList<>();
        String req = "SELECT * FROM goal ORDER BY id_g DESC";

        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(req)) {

            while (rs.next()) {
                goals.add(mapGoal(rs));
            }
        } catch (SQLException e) {
            throw new RuntimeException("Read failed: " + e.getMessage(), e);
        }

        return goals;
    }

    public int countAllGoals() {
        String sql = "SELECT COUNT(*) FROM goal";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {
            if (rs.next()) {
                return rs.getInt(1);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Count failed: " + e.getMessage(), e);
        }
        return 0;
    }

    public int countCompletedGoals() {
        String sql = "SELECT COUNT(*) FROM goal WHERE UPPER(status_goa)='TERMINE'";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {
            if (rs.next()) {
                return rs.getInt(1);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Completed count failed: " + e.getMessage(), e);
        }
        return 0;
    }

    public double averageProgress() {
        String sql = "SELECT AVG(progress_goa) FROM goal";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {
            if (rs.next()) {
                return rs.getDouble(1);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Average progress failed: " + e.getMessage(), e);
        }
        return 0;
    }

    private Goal mapGoal(ResultSet rs) throws SQLException {
        Goal goal = new Goal();
        goal.setIdG(rs.getInt("id_g"));
        goal.setTitleGoa(rs.getString("title_goa"));
        goal.setDescriptionGoa(rs.getString("description_goa"));

        Date debut = rs.getDate("date_debut_goa");
        if (debut != null) {
            goal.setDateDebutGoa(debut.toLocalDate());
        }

        Date fin = rs.getDate("date_final_goa");
        if (fin != null) {
            goal.setDateFinalGoa(fin.toLocalDate());
        }

        double progress = rs.getDouble("progress_goa");
        if (rs.wasNull()) {
            goal.setProgressGoa(null);
        } else {
            goal.setProgressGoa(progress);
        }

        goal.setStatusGoa(rs.getString("status_goa"));
        goal.setCategoryGoa(rs.getString("category_goa"));
        goal.setPriorityGoa(rs.getString("priority_goa"));
        goal.setNotesGoa(rs.getString("notes_goa"));
        goal.setColorGoa(rs.getString("color_goa"));
        return goal;
    }

    private void setDate(PreparedStatement ps, int index, LocalDate date) throws SQLException {
        if (date == null) {
            ps.setNull(index, Types.DATE);
        } else {
            ps.setDate(index, Date.valueOf(date));
        }
    }

    private void validateGoal(Goal goal) {
        if (goal == null) {
            throw new IllegalArgumentException("Goal is required.");
        }

        String title = safe(goal.getTitleGoa());
        String description = safe(goal.getDescriptionGoa());
        String category = safe(goal.getCategoryGoa());
        String status = safe(goal.getStatusGoa());
        String priority = safe(goal.getPriorityGoa());
        String notes = safe(goal.getNotesGoa());
        LocalDate startDate = goal.getDateDebutGoa();
        LocalDate endDate = goal.getDateFinalGoa();
        double progress = goal.getProgressGoa() == null ? 0 : goal.getProgressGoa();

        if (title.isEmpty() || title.length() < 3 || title.length() > 255) {
            throw new IllegalArgumentException("Title must contain between 3 and 255 characters.");
        }
        if (description.isEmpty() || description.length() < 10) {
            throw new IllegalArgumentException("Description must contain at least 10 characters.");
        }
        if (startDate == null || endDate == null) {
            throw new IllegalArgumentException("Start date and end date are required.");
        }
        if (endDate.isBefore(startDate)) {
            throw new IllegalArgumentException("End date must be after or equal to start date.");
        }
        if (status.isEmpty()) {
            throw new IllegalArgumentException("Status is required.");
        }
        if (progress < 0 || progress > 100) {
            throw new IllegalArgumentException("Progress must be between 0 and 100.");
        }
        if (category.isEmpty() || category.length() < 3 || category.length() > 120) {
            throw new IllegalArgumentException("Category must contain between 3 and 120 characters.");
        }
        if (priority.isEmpty()) {
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

    private String safe(String value) {
        return value == null ? "" : value.trim();
    }
}
