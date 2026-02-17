<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260216223809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE time_message (id_time_message INT AUTO_INCREMENT NOT NULL, title_msg VARCHAR(255) NOT NULL, message_type_g VARCHAR(50) NOT NULL, content_msg LONGTEXT NOT NULL, video_path_msg VARCHAR(255) DEFAULT NULL, delivery_date_msg DATETIME DEFAULT NULL, is_delivered_msg TINYINT DEFAULT 0 NOT NULL, created_at_msg DATETIME NOT NULL, id_user INT NOT NULL, parent_message_id INT DEFAULT NULL, id_g INT DEFAULT NULL, INDEX IDX_E23A9119C641B109 (id_g), PRIMARY KEY (id_time_message)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE time_message ADD CONSTRAINT FK_E23A9119C641B109 FOREIGN KEY (id_g) REFERENCES goal (id_g)');
        $this->addSql('ALTER TABLE goal CHANGE date_debut_goa date_debut_goa DATE DEFAULT NULL, CHANGE date_final_goa date_final_goa DATE DEFAULT NULL');
        $this->addSql('DROP INDEX idx_user_id ON mood_click');
        $this->addSql('DROP INDEX idx_mood_type ON mood_click');
        $this->addSql('DROP INDEX idx_clicked_at ON mood_click');
        $this->addSql('ALTER TABLE mood_click MODIFY id_click INT NOT NULL');
        $this->addSql('ALTER TABLE mood_click DROP user_id, DROP ip_address, CHANGE id_click id INT AUTO_INCREMENT NOT NULL, CHANGE mood_type mood_click VARCHAR(50) NOT NULL, CHANGE session_id ip_address_click VARCHAR(255) DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE theme CHANGE description_q description_q LONGTEXT NOT NULL, CHANGE intention intention VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_message DROP FOREIGN KEY FK_E23A9119C641B109');
        $this->addSql('DROP TABLE time_message');
        $this->addSql('ALTER TABLE goal CHANGE date_debut_goa date_debut_goa DATE NOT NULL, CHANGE date_final_goa date_final_goa DATE NOT NULL');
        $this->addSql('ALTER TABLE mood_click MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE mood_click ADD user_id INT NOT NULL, ADD ip_address VARCHAR(45) DEFAULT NULL, CHANGE id id_click INT AUTO_INCREMENT NOT NULL, CHANGE mood_click mood_type VARCHAR(50) NOT NULL, CHANGE ip_address_click session_id VARCHAR(255) DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_click)');
        $this->addSql('CREATE INDEX idx_user_id ON mood_click (user_id)');
        $this->addSql('CREATE INDEX idx_mood_type ON mood_click (mood_type)');
        $this->addSql('CREATE INDEX idx_clicked_at ON mood_click (clicked_at)');
        $this->addSql('ALTER TABLE theme CHANGE description_q description_q LONGTEXT DEFAULT NULL, CHANGE intention intention VARCHAR(255) DEFAULT NULL');
    }
}
