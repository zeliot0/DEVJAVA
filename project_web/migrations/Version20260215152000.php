<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260215152000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add suggested theme fields to conscience_feedback';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE conscience_feedback ADD suggested_theme_name VARCHAR(150) DEFAULT NULL, ADD suggested_theme_goal LONGTEXT DEFAULT NULL, ADD suggested_theme_vibe VARCHAR(40) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE conscience_feedback DROP suggested_theme_name, DROP suggested_theme_goal, DROP suggested_theme_vibe');
    }
}
