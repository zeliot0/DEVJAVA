<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260226101000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create risk table for AI risk analysis';
    }

    public function up(Schema $schema): void
    {
        if (!$schema->hasTable('risk')) {
            $this->addSql('CREATE TABLE risk (id INT AUTO_INCREMENT NOT NULL, goal_id INT DEFAULT NULL, user_id INT DEFAULT NULL, description LONGTEXT NOT NULL, ai_score DOUBLE DEFAULT NULL, ai_advice LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_RISK_GOAL (goal_id), INDEX IDX_RISK_USER (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
            $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_RISK_GOAL FOREIGN KEY (goal_id) REFERENCES goal (id_g)');
            $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_RISK_USER FOREIGN KEY (user_id) REFERENCES user (id_user)');
        }
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_RISK_GOAL');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_RISK_USER');
        $this->addSql('DROP TABLE risk');
    }
}
