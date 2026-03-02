<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260210103000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create mood_click table to track mood filter clicks';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE mood_click (
                id INT AUTO_INCREMENT NOT NULL,
                mood_click VARCHAR(50) NOT NULL,
                clicked_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)',
                ip_address_click VARCHAR(255) DEFAULT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE mood_click');
    }
}

