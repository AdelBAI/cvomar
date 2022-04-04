<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220327235307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('CREATE TABLE IF NOT EXISTS experience (id INT NOT NULL, user_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, begin_date DATE NOT NULL, end_date DATE NOT NULL, description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IF NOT EXISTS IDX_590C1039D86650F ON experience (user_id_id)');
        $this->addSql('CREATE TABLE IF NOT EXISTS "user" (id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, age INT NOT NULL, adress VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, date_of_birth DATE NOT NULL, city VARCHAR(255) NOT NULL, degree VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id), type VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE SEQUENCE IF NOT EXISTS experience_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE IF NOT EXISTS "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE  experience ADD CONSTRAINT FK_590C1039D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('INSERT INTO  public."user" (id, first_name, last_name, age, email, adress, phone, date_of_birth, city, "degree", photo) VALUES (1,"Omar","Abdelmalek",28,"omarmalek@hotmail.fr","60 rue de la justice","0777262896",2022-03-03,"Lille","BACK + 4","./image") ');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}

