<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221129041333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX fk_user ON planing');
        $this->addSql('ALTER TABLE planing CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('CREATE INDEX fk_user ON planing (id_user)');
        $this->addSql('ALTER TABLE rendezvous CHANGE id_service id_service INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX fk_user ON planing');
        $this->addSql('ALTER TABLE planing CHANGE id_user id_user INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX fk_user ON planing (id_user)');
        $this->addSql('ALTER TABLE rendezvous CHANGE id_service id_service INT NOT NULL');
    }
}
