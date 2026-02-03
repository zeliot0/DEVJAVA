<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260203004221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE goal (id INT AUTO_INCREMENT NOT NULL, id_g INT NOT NULL, description_goa VARCHAR(255) NOT NULL, date_debut_goa DATE NOT NULL, date_final_goa DATE NOT NULL, status_goa VARCHAR(255) NOT NULL, progress_goa DOUBLE PRECISION DEFAULT NULL, category_goa VARCHAR(255) NOT NULL, milestones_id INT DEFAULT NULL, INDEX IDX_FCDCEB2E813CB8C1 (milestones_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE milestones (id INT AUTO_INCREMENT NOT NULL, title_goa VARCHAR(255) NOT NULL, description_goa VARCHAR(255) NOT NULL, createdat_goa DATE NOT NULL, completedat_goa DATE NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2E813CB8C1 FOREIGN KEY (milestones_id) REFERENCES milestones (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2E813CB8C1');
        $this->addSql('DROP TABLE goal');
        $this->addSql('DROP TABLE milestones');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
