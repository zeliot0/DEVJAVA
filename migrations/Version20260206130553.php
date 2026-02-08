<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260206130553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE motivation (id_motiv INT AUTO_INCREMENT NOT NULL, title_motiv VARCHAR(255) NOT NULL, image_motiv VARCHAR(255) DEFAULT NULL, description_motiv LONGTEXT NOT NULL, mood_motiv VARCHAR(50) NOT NULL, PRIMARY KEY (id_motiv)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE goal CHANGE date_debut_goa date_debut_goa DATE DEFAULT NULL, CHANGE date_final_goa date_final_goa DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE milestones DROP FOREIGN KEY `FK_18F78184667D1AFE`');
        $this->addSql('DROP INDEX idx_milestones_goal ON milestones');
        $this->addSql('CREATE INDEX IDX_18F78184667D1AFE ON milestones (goal_id)');
        $this->addSql('ALTER TABLE milestones ADD CONSTRAINT `FK_18F78184667D1AFE` FOREIGN KEY (goal_id) REFERENCES goal (id_g)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE motivation');
        $this->addSql('ALTER TABLE goal CHANGE date_debut_goa date_debut_goa DATE NOT NULL, CHANGE date_final_goa date_final_goa DATE NOT NULL');
        $this->addSql('ALTER TABLE milestones DROP FOREIGN KEY FK_18F78184667D1AFE');
        $this->addSql('DROP INDEX idx_18f78184667d1afe ON milestones');
        $this->addSql('CREATE INDEX idx_milestones_goal ON milestones (goal_id)');
        $this->addSql('ALTER TABLE milestones ADD CONSTRAINT FK_18F78184667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id_g)');
    }
}
