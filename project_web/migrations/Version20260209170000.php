<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260209170000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add missing photo_p column on produit table';
    }

    public function up(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['produit'])) {
            return;
        }

        $columns = array_map(
            static fn ($column) => strtolower($column->getName()),
            $schemaManager->listTableColumns('produit')
        );

        if (!in_array('photo_p', $columns, true)) {
            $this->addSql('ALTER TABLE produit ADD photo_p VARCHAR(255) DEFAULT NULL');
        }
    }

    public function down(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['produit'])) {
            return;
        }

        $columns = array_map(
            static fn ($column) => strtolower($column->getName()),
            $schemaManager->listTableColumns('produit')
        );

        if (in_array('photo_p', $columns, true)) {
            $this->addSql('ALTER TABLE produit DROP COLUMN photo_p');
        }
    }
}
