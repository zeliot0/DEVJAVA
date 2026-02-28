<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260226093000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add wisdom_shared flag to phoenix_goal and default false';
    }

    public function up(Schema $schema): void
    {
        if ($schema->hasTable('phoenix_goal')) {
            $table = $schema->getTable('phoenix_goal');
            if (!$table->hasColumn('wisdom_shared')) {
                $this->addSql('ALTER TABLE phoenix_goal ADD wisdom_shared TINYINT(1) NOT NULL DEFAULT 0');
            }
        }
    }

    public function down(Schema $schema): void
    {
        if ($schema->hasTable('phoenix_goal')) {
            $table = $schema->getTable('phoenix_goal');
            if ($table->hasColumn('wisdom_shared')) {
                $this->addSql('ALTER TABLE phoenix_goal DROP wisdom_shared');
            }
        }
    }
}
