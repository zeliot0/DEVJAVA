<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260227223000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add AI columns to goal and risk tables if missing';
    }

    public function up(Schema $schema): void
    {
        // safe ALTERs with IF NOT EXISTS (MySQL 8+). If your MySQL version
        // doesn't support IF NOT EXISTS for ADD COLUMN, adjust accordingly.
        $this->addSql("ALTER TABLE `goal` ADD COLUMN IF NOT EXISTS `success_score` DOUBLE NULL;");
        $this->addSql("ALTER TABLE `goal` ADD COLUMN IF NOT EXISTS `ai_success_score` INT NULL;");
        $this->addSql("ALTER TABLE `goal` ADD COLUMN IF NOT EXISTS `ai_success_advice` LONGTEXT NULL;");

        $this->addSql("ALTER TABLE `risk` ADD COLUMN IF NOT EXISTS `ai_risk_score` INT NULL;");
        $this->addSql("ALTER TABLE `risk` ADD COLUMN IF NOT EXISTS `ai_mitigation_plan` LONGTEXT NULL;");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("ALTER TABLE `goal` DROP COLUMN IF EXISTS `ai_success_advice`;");
        $this->addSql("ALTER TABLE `goal` DROP COLUMN IF EXISTS `ai_success_score`;");
        $this->addSql("ALTER TABLE `goal` DROP COLUMN IF EXISTS `success_score`;");

        $this->addSql("ALTER TABLE `risk` DROP COLUMN IF EXISTS `ai_mitigation_plan`;");
        $this->addSql("ALTER TABLE `risk` DROP COLUMN IF EXISTS `ai_risk_score`;");
    }
}
