<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260226215521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE risk (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, ai_score DOUBLE PRECISION DEFAULT NULL, ai_advice LONGTEXT DEFAULT NULL, ai_category VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, goal_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_7906D541667D1AFE (goal_id), INDEX IDX_7906D541A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_7906D541667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id_g) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_7906D541A76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE goal ADD success_score DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE phoenix_goal ADD wisdom_shared TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE phoenix_wisdom ADD phoenix_goal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE phoenix_wisdom ADD CONSTRAINT FK_E49034B3E4458B84 FOREIGN KEY (phoenix_goal_id) REFERENCES phoenix_goal (id)');
        $this->addSql('CREATE INDEX IDX_E49034B3E4458B84 ON phoenix_wisdom (phoenix_goal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_7906D541667D1AFE');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_7906D541A76ED395');
        $this->addSql('DROP TABLE risk');
        $this->addSql('ALTER TABLE goal DROP success_score');
        $this->addSql('ALTER TABLE phoenix_goal DROP wisdom_shared');
        $this->addSql('ALTER TABLE phoenix_wisdom DROP FOREIGN KEY FK_E49034B3E4458B84');
        $this->addSql('DROP INDEX IDX_E49034B3E4458B84 ON phoenix_wisdom');
        $this->addSql('ALTER TABLE phoenix_wisdom DROP phoenix_goal_id');
    }
}
