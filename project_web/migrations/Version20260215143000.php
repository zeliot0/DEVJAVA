<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260215143000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create conscience_feedback table for user satisfaction and favorite theme feedback';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE conscience_feedback (
                id_feedback INT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                favorite_theme_id INT DEFAULT NULL,
                satisfaction SMALLINT NOT NULL,
                comment LONGTEXT DEFAULT NULL,
                created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)',
                INDEX IDX_9EB11476A76ED395 (user_id),
                INDEX IDX_9EB114761211D031 (favorite_theme_id),
                PRIMARY KEY(id_feedback)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        $this->addSql('ALTER TABLE conscience_feedback ADD CONSTRAINT FK_9EB11476A76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conscience_feedback ADD CONSTRAINT FK_9EB114761211D031 FOREIGN KEY (favorite_theme_id) REFERENCES theme (id_t) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE conscience_feedback');
    }
}
