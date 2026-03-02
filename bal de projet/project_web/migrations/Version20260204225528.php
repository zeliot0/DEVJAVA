<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260204225528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_response MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE user_response ADD question_id INT NOT NULL, DROP humeur, CHANGE valeur valeur LONGTEXT DEFAULT NULL, CHANGE id id_r INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_r)');
        $this->addSql('ALTER TABLE user_response ADD CONSTRAINT FK_DEF6EFFB1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_DEF6EFFB1E27F6BF ON user_response (question_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_response DROP FOREIGN KEY FK_DEF6EFFB1E27F6BF');
        $this->addSql('DROP INDEX IDX_DEF6EFFB1E27F6BF ON user_response');
        $this->addSql('ALTER TABLE user_response MODIFY id_r INT NOT NULL');
        $this->addSql('ALTER TABLE user_response ADD humeur VARCHAR(255) DEFAULT NULL, DROP question_id, CHANGE valeur valeur DOUBLE PRECISION NOT NULL, CHANGE id_r id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
