<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321080732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD conducteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5F16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES conducteur (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5F16F4AC6 ON annonce (conducteur_id)');
        $this->addSql('ALTER TABLE reservation ADD annonce_id INT DEFAULT NULL, ADD commentaire_id INT DEFAULT NULL, ADD passager_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849558805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495571A51189 FOREIGN KEY (passager_id) REFERENCES passager (id)');
        $this->addSql('CREATE INDEX IDX_42C849558805AB2F ON reservation (annonce_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C84955BA9CD190 ON reservation (commentaire_id)');
        $this->addSql('CREATE INDEX IDX_42C8495571A51189 ON reservation (passager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5F16F4AC6');
        $this->addSql('DROP INDEX IDX_F65593E5F16F4AC6 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP conducteur_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849558805AB2F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BA9CD190');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495571A51189');
        $this->addSql('DROP INDEX IDX_42C849558805AB2F ON reservation');
        $this->addSql('DROP INDEX UNIQ_42C84955BA9CD190 ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495571A51189 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP annonce_id, DROP commentaire_id, DROP passager_id');
    }
}
