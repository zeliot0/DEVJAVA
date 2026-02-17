<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260210091500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create motivation table used by App\\Entity\\Motivation';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE motivation (
                id_motiv INT AUTO_INCREMENT NOT NULL,
                title_motiv VARCHAR(255) NOT NULL,
                image_motiv VARCHAR(255) DEFAULT NULL,
                description_motiv LONGTEXT NOT NULL,
                mood_motiv VARCHAR(50) NOT NULL,
                PRIMARY KEY(id_motiv)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE motivation');
    }
}

