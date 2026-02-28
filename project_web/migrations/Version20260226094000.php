<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260226094000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Link phoenix_wisdom to phoenix_goal by adding phoenix_goal_id';
    }

    public function up(Schema $schema): void
    {
        if ($schema->hasTable('phoenix_wisdom')) {
            $table = $schema->getTable('phoenix_wisdom');
            if (!$table->hasColumn('phoenix_goal_id')) {
                $this->addSql('ALTER TABLE phoenix_wisdom ADD phoenix_goal_id INT DEFAULT NULL');
                $this->addSql('ALTER TABLE phoenix_wisdom ADD CONSTRAINT FK_14A3BA0496BA4A2E FOREIGN KEY (phoenix_goal_id) REFERENCES phoenix_goal (id)');
            }
        }
    }

    public function down(Schema $schema): void
    {
        if ($schema->hasTable('phoenix_wisdom')) {
            $table = $schema->getTable('phoenix_wisdom');
            if ($table->hasColumn('phoenix_goal_id')) {
                $this->addSql('ALTER TABLE phoenix_wisdom DROP FOREIGN KEY FK_14A3BA0496BA4A2E');
                $this->addSql('ALTER TABLE phoenix_wisdom DROP phoenix_goal_id');
            }
        }
    }
}
