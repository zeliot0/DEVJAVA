<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260222010451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Align legacy database with current User/RegistrationAttempt entities';
    }

    public function up(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['registration_attempt'])) {
            $this->addSql(<<<'SQL'
                CREATE TABLE registration_attempt (
                    id INT AUTO_INCREMENT NOT NULL,
                    email VARCHAR(180) NOT NULL,
                    status VARCHAR(30) NOT NULL,
                    reason VARCHAR(255) DEFAULT NULL,
                    ip_address VARCHAR(45) DEFAULT NULL,
                    country VARCHAR(100) DEFAULT NULL,
                    city VARCHAR(100) DEFAULT NULL,
                    latitude DOUBLE PRECISION DEFAULT NULL,
                    longitude DOUBLE PRECISION DEFAULT NULL,
                    created_at DATETIME NOT NULL,
                    PRIMARY KEY(id)
                ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`
            SQL);
        }

        if (!$schemaManager->tablesExist(['user'])) {
            return;
        }

        $columns = array_map(
            static fn ($column) => strtolower($column->getName()),
            $schemaManager->listTableColumns('user')
        );

        if (!in_array('reset_token', $columns, true)) {
            $this->addSql('ALTER TABLE user ADD reset_token VARCHAR(100) DEFAULT NULL');
        }
        if (!in_array('reset_token_expires_at', $columns, true)) {
            $this->addSql('ALTER TABLE user ADD reset_token_expires_at DATETIME DEFAULT NULL');
        }
        if (!in_array('is_blocked', $columns, true)) {
            $this->addSql('ALTER TABLE user ADD is_blocked TINYINT(1) NOT NULL DEFAULT 0');
        }
        if (!in_array('is_verified', $columns, true)) {
            $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL DEFAULT 0');
        }
        if (!in_array('verification_token', $columns, true)) {
            $this->addSql('ALTER TABLE user ADD verification_token VARCHAR(100) DEFAULT NULL');
        }
        if (!in_array('face_descriptor', $columns, true)) {
            $this->addSql('ALTER TABLE user ADD face_descriptor LONGTEXT DEFAULT NULL');
        }
        if (!in_array('face_enabled', $columns, true)) {
            $this->addSql('ALTER TABLE user ADD face_enabled TINYINT(1) NOT NULL DEFAULT 0');
        }
    }

    public function down(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if ($schemaManager->tablesExist(['user'])) {
            $columns = array_map(
                static fn ($column) => strtolower($column->getName()),
                $schemaManager->listTableColumns('user')
            );

            if (in_array('face_enabled', $columns, true)) {
                $this->addSql('ALTER TABLE user DROP COLUMN face_enabled');
            }
            if (in_array('face_descriptor', $columns, true)) {
                $this->addSql('ALTER TABLE user DROP COLUMN face_descriptor');
            }
            if (in_array('verification_token', $columns, true)) {
                $this->addSql('ALTER TABLE user DROP COLUMN verification_token');
            }
            if (in_array('is_verified', $columns, true)) {
                $this->addSql('ALTER TABLE user DROP COLUMN is_verified');
            }
            if (in_array('is_blocked', $columns, true)) {
                $this->addSql('ALTER TABLE user DROP COLUMN is_blocked');
            }
            if (in_array('reset_token_expires_at', $columns, true)) {
                $this->addSql('ALTER TABLE user DROP COLUMN reset_token_expires_at');
            }
            if (in_array('reset_token', $columns, true)) {
                $this->addSql('ALTER TABLE user DROP COLUMN reset_token');
            }
        }

        if ($schemaManager->tablesExist(['registration_attempt'])) {
            $this->addSql('DROP TABLE registration_attempt');
        }
    }
}
