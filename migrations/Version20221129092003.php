<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221129092003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planing CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planings_rendezvouss DROP FOREIGN KEY planings_rendezvouss_ibfk_2');
        $this->addSql('DROP INDEX planings_rendezvouss_rendezvous_id_uniq ON planings_rendezvouss');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32F87A703345E0A3 ON planings_rendezvouss (rendezvous_id)');
        $this->addSql('ALTER TABLE planings_rendezvouss ADD CONSTRAINT planings_rendezvouss_ibfk_2 FOREIGN KEY (rendezvous_id) REFERENCES rendezvous (id)');
        $this->addSql('ALTER TABLE rendezvous CHANGE id_service id_service INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planing CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE planings_rendezvouss DROP FOREIGN KEY FK_32F87A703345E0A3');
        $this->addSql('DROP INDEX uniq_32f87a703345e0a3 ON planings_rendezvouss');
        $this->addSql('CREATE UNIQUE INDEX planings_rendezvouss_rendezvous_id_uniq ON planings_rendezvouss (rendezvous_id)');
        $this->addSql('ALTER TABLE planings_rendezvouss ADD CONSTRAINT FK_32F87A703345E0A3 FOREIGN KEY (rendezvous_id) REFERENCES rendezvous (id)');
        $this->addSql('ALTER TABLE rendezvous CHANGE id_service id_service INT NOT NULL');
    }
}
