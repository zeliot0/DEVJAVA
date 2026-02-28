<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260218120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add theme follow and conscience user notifications tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE theme_follow (
                id INT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                theme_id INT NOT NULL,
                created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)',
                INDEX IDX_B767C268A76ED395 (user_id),
                INDEX IDX_B767C26859027487 (theme_id),
                UNIQUE INDEX uniq_theme_follow_user_theme (user_id, theme_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        $this->addSql(<<<'SQL'
            CREATE TABLE user_notification (
                id INT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                type VARCHAR(60) NOT NULL,
                message VARCHAR(255) NOT NULL,
                is_read TINYINT(1) NOT NULL,
                created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)',
                notification_date DATE DEFAULT NULL,
                INDEX IDX_D3A43E76A76ED395 (user_id),
                INDEX IDX_D3A43E76A812CF76 (is_read),
                INDEX IDX_D3A43E761D9A6B16 (notification_date),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        $this->addSql('ALTER TABLE theme_follow ADD CONSTRAINT FK_B767C268A76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE theme_follow ADD CONSTRAINT FK_B767C26859027487 FOREIGN KEY (theme_id) REFERENCES theme (id_t) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_notification ADD CONSTRAINT FK_D3A43E76A76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE user_notification');
        $this->addSql('DROP TABLE theme_follow');
    }
}
