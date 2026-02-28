<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260227223151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phoenix_goal CHANGE wisdom_shared wisdom_shared TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE phoenix_wisdom DROP FOREIGN KEY FK_14A3BA0496BA4A2E');
        $this->addSql('DROP INDEX fk_14a3ba0496ba4a2e ON phoenix_wisdom');
        $this->addSql('CREATE INDEX IDX_E49034B3E4458B84 ON phoenix_wisdom (phoenix_goal_id)');
        $this->addSql('ALTER TABLE phoenix_wisdom ADD CONSTRAINT FK_14A3BA0496BA4A2E FOREIGN KEY (phoenix_goal_id) REFERENCES phoenix_goal (id)');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_RISK_GOAL');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_RISK_USER');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_RISK_GOAL');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_RISK_USER');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_7906D541667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id_g) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_7906D541A76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE SET NULL');
        $this->addSql('DROP INDEX idx_risk_goal ON risk');
        $this->addSql('CREATE INDEX IDX_7906D541667D1AFE ON risk (goal_id)');
        $this->addSql('DROP INDEX idx_risk_user ON risk');
        $this->addSql('CREATE INDEX IDX_7906D541A76ED395 ON risk (user_id)');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_RISK_GOAL FOREIGN KEY (goal_id) REFERENCES goal (id_g)');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_RISK_USER FOREIGN KEY (user_id) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE user ADD birth_date DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phoenix_goal CHANGE wisdom_shared wisdom_shared TINYINT(1) DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE phoenix_wisdom DROP FOREIGN KEY FK_E49034B3E4458B84');
        $this->addSql('DROP INDEX idx_e49034b3e4458b84 ON phoenix_wisdom');
        $this->addSql('CREATE INDEX FK_14A3BA0496BA4A2E ON phoenix_wisdom (phoenix_goal_id)');
        $this->addSql('ALTER TABLE phoenix_wisdom ADD CONSTRAINT FK_E49034B3E4458B84 FOREIGN KEY (phoenix_goal_id) REFERENCES phoenix_goal (id)');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_7906D541667D1AFE');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_7906D541A76ED395');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_7906D541667D1AFE');
        $this->addSql('ALTER TABLE risk DROP FOREIGN KEY FK_7906D541A76ED395');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_RISK_GOAL FOREIGN KEY (goal_id) REFERENCES goal (id_g)');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_RISK_USER FOREIGN KEY (user_id) REFERENCES user (id_user)');
        $this->addSql('DROP INDEX idx_7906d541667d1afe ON risk');
        $this->addSql('CREATE INDEX IDX_RISK_GOAL ON risk (goal_id)');
        $this->addSql('DROP INDEX idx_7906d541a76ed395 ON risk');
        $this->addSql('CREATE INDEX IDX_RISK_USER ON risk (user_id)');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_7906D541667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id_g) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE risk ADD CONSTRAINT FK_7906D541A76ED395 FOREIGN KEY (user_id) REFERENCES user (id_user) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE user DROP birth_date');
    }
}
