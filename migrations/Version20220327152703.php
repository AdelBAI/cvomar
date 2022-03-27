<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220327152703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE experience_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE omar_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE experience (id INT NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, begin_date DATE NOT NULL, end_date DATE NOT NULL, description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE omar (id INT NOT NULL, experiences_id INT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C0E32ACC423DE140 ON omar (experiences_id)');
        $this->addSql('ALTER TABLE omar ADD CONSTRAINT FK_C0E32ACC423DE140 FOREIGN KEY (experiences_id) REFERENCES experience (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE omar DROP CONSTRAINT FK_C0E32ACC423DE140');
        $this->addSql('DROP SEQUENCE experience_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE omar_id_seq CASCADE');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE omar');
    }
}
