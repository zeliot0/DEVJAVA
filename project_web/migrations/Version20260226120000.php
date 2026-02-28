<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260226120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add success_score to goal and ai_category to risk';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE goal ADD success_score DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE risk ADD ai_category VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE goal DROP success_score');
        $this->addSql('ALTER TABLE risk DROP ai_category');
    }
}
