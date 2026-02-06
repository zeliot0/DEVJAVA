<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260204230822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE goal (id_g INT AUTO_INCREMENT NOT NULL, title_goa VARCHAR(255) NOT NULL, description_goa VARCHAR(255) NOT NULL, date_debut_goa DATE NOT NULL, date_final_goa DATE NOT NULL, status_goa VARCHAR(255) NOT NULL, progress_goa DOUBLE PRECISION DEFAULT NULL, category_goa VARCHAR(255) NOT NULL, priority_goa VARCHAR(255) NOT NULL, notes_goa LONGTEXT DEFAULT NULL, color_goa VARCHAR(50) DEFAULT NULL, PRIMARY KEY (id_g)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE milestones (id_m INT AUTO_INCREMENT NOT NULL, title_milestone VARCHAR(255) NOT NULL, description_milestone VARCHAR(255) NOT NULL, due_date DATETIME NOT NULL, completed_date DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, goal_id INT NOT NULL, INDEX IDX_18F78184667D1AFE (goal_id), PRIMARY KEY (id_m)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE milestones ADD CONSTRAINT FK_18F78184667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id_g)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE milestones DROP FOREIGN KEY FK_18F78184667D1AFE');
        $this->addSql('DROP TABLE goal');
        $this->addSql('DROP TABLE milestones');
    }
}
