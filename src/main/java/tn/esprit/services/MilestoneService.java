package tn.esprit.services;

import tn.esprit.entities.Milestone;
import tn.esprit.tools.MyDataBase;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Timestamp;
import java.sql.Types;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class MilestoneService implements IMilestoneService<Milestone> {

    private final Connection cnx;

    public MilestoneService() {
        cnx = MyDataBase.getInstance().getCnx();
    }

    @Override
    public void add(Milestone milestone) throws SQLException {
        validateMilestone(milestone);
        String sql = "INSERT INTO milestones "
                + "(title_milestone, description_milestone, due_date, completed_date, created_at, goal_id) "
                + "VALUES (?, ?, ?, ?, ?, ?)";

        try (PreparedStatement ps = cnx.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, milestone.getTitleMilestone());
            ps.setString(2, milestone.getDescriptionMilestone());
            setTimestamp(ps, 3, milestone.getDueDate());
            setTimestamp(ps, 4, milestone.getCompletedDate());
            setTimestamp(ps, 5, milestone.getCreatedAt());
            ps.setInt(6, milestone.getGoalId());

            ps.executeUpdate();

            try (ResultSet rs = ps.getGeneratedKeys()) {
                if (rs.next()) {
                    milestone.setIdM(rs.getInt(1));
                }
            }
        }
    }

    @Override
    public void update(Milestone milestone) {
        validateMilestone(milestone);
        String sql = "UPDATE milestones SET "
                + "title_milestone=?, description_milestone=?, due_date=?, completed_date=?, created_at=?, goal_id=? "
                + "WHERE id_m=?";

        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, milestone.getTitleMilestone());
            ps.setString(2, milestone.getDescriptionMilestone());
            setTimestamp(ps, 3, milestone.getDueDate());
            setTimestamp(ps, 4, milestone.getCompletedDate());
            setTimestamp(ps, 5, milestone.getCreatedAt());
            ps.setInt(6, milestone.getGoalId());
            ps.setInt(7, milestone.getIdM());

            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Milestone update failed: " + e.getMessage(), e);
        }
    }

    @Override
    public void delete(Milestone milestone) {
        String sql = "DELETE FROM milestones WHERE id_m=?";

        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, milestone.getIdM());
            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Milestone delete failed: " + e.getMessage(), e);
        }
    }

    @Override
    public List<Milestone> getAll() {
        List<Milestone> milestones = new ArrayList<>();
        String sql = "SELECT * FROM milestones ORDER BY id_m DESC";

        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {

            while (rs.next()) {
                milestones.add(mapMilestone(rs));
            }
        } catch (SQLException e) {
            throw new RuntimeException("Milestone read failed: " + e.getMessage(), e);
        }

        return milestones;
    }

    public List<Milestone> getByGoalId(int goalId) {
        List<Milestone> milestones = new ArrayList<>();
        String sql = "SELECT * FROM milestones WHERE goal_id=? ORDER BY id_m DESC";

        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, goalId);

            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    milestones.add(mapMilestone(rs));
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Milestones by goal read failed: " + e.getMessage(), e);
        }

        return milestones;
    }

    private Milestone mapMilestone(ResultSet rs) throws SQLException {
        Milestone milestone = new Milestone();
        milestone.setIdM(rs.getInt("id_m"));
        milestone.setTitleMilestone(rs.getString("title_milestone"));
        milestone.setDescriptionMilestone(rs.getString("description_milestone"));

        Timestamp due = rs.getTimestamp("due_date");
        if (due != null) {
            milestone.setDueDate(due.toLocalDateTime());
        }

        Timestamp completed = rs.getTimestamp("completed_date");
        if (completed != null) {
            milestone.setCompletedDate(completed.toLocalDateTime());
        }

        Timestamp created = rs.getTimestamp("created_at");
        if (created != null) {
            milestone.setCreatedAt(created.toLocalDateTime());
        }

        milestone.setGoalId(rs.getInt("goal_id"));
        return milestone;
    }

    private void setTimestamp(PreparedStatement ps, int index, LocalDateTime value) throws SQLException {
        if (value == null) {
            ps.setNull(index, Types.TIMESTAMP);
        } else {
            ps.setTimestamp(index, Timestamp.valueOf(value));
        }
    }

    private void validateMilestone(Milestone milestone) {
        if (milestone == null) {
            throw new IllegalArgumentException("Milestone is required.");
        }

        String title = safe(milestone.getTitleMilestone());
        String description = safe(milestone.getDescriptionMilestone());

        if (title.isEmpty() || title.length() < 3 || title.length() > 255) {
            throw new IllegalArgumentException("Milestone title must contain between 3 and 255 characters.");
        }
        if (description.isEmpty() || description.length() < 5 || description.length() > 1000) {
            throw new IllegalArgumentException("Milestone description must contain between 5 and 1000 characters.");
        }
        if (milestone.getDueDate() == null) {
            throw new IllegalArgumentException("Milestone due date is required.");
        }
        if (milestone.getGoalId() <= 0) {
            throw new IllegalArgumentException("A valid goal is required for the milestone.");
        }
        if (milestone.getCreatedAt() == null) {
            throw new IllegalArgumentException("Milestone creation date is required.");
        }
        if (milestone.getCompletedDate() != null && milestone.getCompletedDate().isBefore(milestone.getCreatedAt())) {
            throw new IllegalArgumentException("Milestone completion date cannot be before creation date.");
        }
    }

    private String safe(String value) {
        return value == null ? "" : value.trim();
    }
}
