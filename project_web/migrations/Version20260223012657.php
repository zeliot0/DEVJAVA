<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260223012657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Only create tables that don't exist
        if (!$schema->hasTable('phoenix_goal')) {
            $this->addSql('CREATE TABLE phoenix_goal (id INT AUTO_INCREMENT NOT NULL, death_analysis LONGTEXT NOT NULL, ashes_data JSON NOT NULL, death_date DATETIME NOT NULL, rebirth_date DATETIME DEFAULT NULL, phoenix_phase VARCHAR(50) NOT NULL, phoenix_level INT NOT NULL, resurrection_plan JSON DEFAULT NULL, immortality_enabled TINYINT(1) NOT NULL, original_goal_id INT NOT NULL, reborn_goal_id INT DEFAULT NULL, user_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_D875F3CBE0FDB409 (original_goal_id), UNIQUE INDEX UNIQ_D875F3CBDF29DC72 (reborn_goal_id), INDEX IDX_D875F3CBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
            $this->addSql('ALTER TABLE phoenix_goal ADD CONSTRAINT FK_D875F3CBE0FDB409 FOREIGN KEY (original_goal_id) REFERENCES goal (id_g)');
            $this->addSql('ALTER TABLE phoenix_goal ADD CONSTRAINT FK_D875F3CBDF29DC72 FOREIGN KEY (reborn_goal_id) REFERENCES goal (id_g)');
            $this->addSql('ALTER TABLE phoenix_goal ADD CONSTRAINT FK_D875F3CBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user)');
        }
        if (!$schema->hasTable('phoenix_network')) {
            $this->addSql('CREATE TABLE phoenix_network (id INT AUTO_INCREMENT NOT NULL, network_type VARCHAR(100) NOT NULL, connected_at DATETIME NOT NULL, mentor_id INT DEFAULT NULL, phoenix_rising_id INT DEFAULT NULL, shared_goal_id INT DEFAULT NULL, INDEX IDX_E2BC16C6DB403044 (mentor_id), INDEX IDX_E2BC16C64EA87A6B (phoenix_rising_id), INDEX IDX_E2BC16C647AA1649 (shared_goal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
            $this->addSql('ALTER TABLE phoenix_network ADD CONSTRAINT FK_E2BC16C6DB403044 FOREIGN KEY (mentor_id) REFERENCES user (id_user)');
            $this->addSql('ALTER TABLE phoenix_network ADD CONSTRAINT FK_E2BC16C64EA87A6B FOREIGN KEY (phoenix_rising_id) REFERENCES user (id_user)');
            $this->addSql('ALTER TABLE phoenix_network ADD CONSTRAINT FK_E2BC16C647AA1649 FOREIGN KEY (shared_goal_id) REFERENCES phoenix_goal (id)');
        }
        if (!$schema->hasTable('phoenix_wisdom')) {
            $this->addSql('CREATE TABLE phoenix_wisdom (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, lesson LONGTEXT NOT NULL, success_count INT NOT NULL, tags JSON NOT NULL, created_at DATETIME NOT NULL, contributor_id INT DEFAULT NULL, INDEX IDX_E49034B37A19A357 (contributor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
            $this->addSql('ALTER TABLE phoenix_wisdom ADD CONSTRAINT FK_E49034B37A19A357 FOREIGN KEY (contributor_id) REFERENCES user (id_user)');
        }
        if (!$schema->hasTable('time_message')) {
            $this->addSql('CREATE TABLE time_message (id_time_message INT AUTO_INCREMENT NOT NULL, title_msg VARCHAR(255) NOT NULL, message_type_g VARCHAR(50) NOT NULL, content_msg LONGTEXT NOT NULL, video_path_msg VARCHAR(255) DEFAULT NULL, delivery_date_msg DATETIME DEFAULT NULL, is_delivered_msg TINYINT(1) NOT NULL, created_at_msg DATETIME NOT NULL, id_user INT NOT NULL, parent_message_id INT DEFAULT NULL, id_g INT DEFAULT NULL, PRIMARY KEY(id_time_message)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phoenix_goal DROP FOREIGN KEY FK_D875F3CBE0FDB409');
        $this->addSql('ALTER TABLE phoenix_goal DROP FOREIGN KEY FK_D875F3CBDF29DC72');
        $this->addSql('ALTER TABLE phoenix_goal DROP FOREIGN KEY FK_D875F3CBA76ED395');
        $this->addSql('ALTER TABLE phoenix_network DROP FOREIGN KEY FK_E2BC16C6DB403044');
        $this->addSql('ALTER TABLE phoenix_network DROP FOREIGN KEY FK_E2BC16C64EA87A6B');
        $this->addSql('ALTER TABLE phoenix_network DROP FOREIGN KEY FK_E2BC16C647AA1649');
        $this->addSql('ALTER TABLE phoenix_wisdom DROP FOREIGN KEY FK_E49034B37A19A357');
        $this->addSql('DROP TABLE phoenix_goal');
        $this->addSql('DROP TABLE phoenix_network');
        $this->addSql('DROP TABLE phoenix_wisdom');
        $this->addSql('DROP TABLE time_message');
        $this->addSql('ALTER TABLE conscience_feedback DROP FOREIGN KEY FK_8066B282A76ED395');
        $this->addSql('ALTER TABLE conscience_feedback DROP FOREIGN KEY FK_8066B282F3556C76');
        $this->addSql('ALTER TABLE conscience_feedback CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('DROP INDEX idx_8066b282f3556c76 ON conscience_feedback');
        $this->addSql('CREATE INDEX IDX_9EB114761211D031 ON conscience_feedback (favorite_theme_id)');
        $this->addSql('DROP INDEX idx_8066b282a76ed395 ON conscience_feedback');
        $this->addSql('CREATE INDEX IDX_9EB11476A76ED395 ON conscience_feedback (user_id)');
        $this->addSql('ALTER TABLE conscience_feedback ADD CONSTRAINT FK_8066B282A76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conscience_feedback ADD CONSTRAINT FK_8066B282F3556C76 FOREIGN KEY (favorite_theme_id) REFERENCES theme (id_t) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE goal CHANGE date_debut_goa date_debut_goa DATE NOT NULL, CHANGE date_final_goa date_final_goa DATE NOT NULL');
        $this->addSql('ALTER TABLE mood_click CHANGE clicked_at clicked_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE theme_follow DROP FOREIGN KEY FK_B80C700CA76ED395');
        $this->addSql('ALTER TABLE theme_follow DROP FOREIGN KEY FK_B80C700C59027487');
        $this->addSql('ALTER TABLE theme_follow CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE UNIQUE INDEX uniq_theme_follow_user_theme ON theme_follow (user_id, theme_id)');
        $this->addSql('DROP INDEX idx_b80c700ca76ed395 ON theme_follow');
        $this->addSql('CREATE INDEX IDX_B767C268A76ED395 ON theme_follow (user_id)');
        $this->addSql('DROP INDEX idx_b80c700c59027487 ON theme_follow');
        $this->addSql('CREATE INDEX IDX_B767C26859027487 ON theme_follow (theme_id)');
        $this->addSql('ALTER TABLE theme_follow ADD CONSTRAINT FK_B80C700CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE theme_follow ADD CONSTRAINT FK_B80C700C59027487 FOREIGN KEY (theme_id) REFERENCES theme (id_t) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD bio VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_notification DROP FOREIGN KEY FK_3F980AC8A76ED395');
        $this->addSql('ALTER TABLE user_notification CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE INDEX IDX_D3A43E76A812CF76 ON user_notification (is_read)');
        $this->addSql('CREATE INDEX IDX_D3A43E761D9A6B16 ON user_notification (notification_date)');
        $this->addSql('DROP INDEX idx_3f980ac8a76ed395 ON user_notification');
        $this->addSql('CREATE INDEX IDX_D3A43E76A76ED395 ON user_notification (user_id)');
        $this->addSql('ALTER TABLE user_notification ADD CONSTRAINT FK_3F980AC8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE CASCADE');
    }
}
