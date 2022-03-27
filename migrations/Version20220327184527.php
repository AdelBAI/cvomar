<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220327184527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C1039D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_590C1039D86650F ON experience (user_id_id)');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d649423de140');
        $this->addSql('DROP INDEX idx_8d93d649423de140');
        $this->addSql('ALTER TABLE "user" ADD phone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP experiences_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE experience DROP CONSTRAINT FK_590C1039D86650F');
        $this->addSql('DROP INDEX IDX_590C1039D86650F');
        $this->addSql('ALTER TABLE experience DROP user_id_id');
        $this->addSql('ALTER TABLE "user" ADD experiences_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" DROP phone');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d649423de140 FOREIGN KEY (experiences_id) REFERENCES experience (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_8d93d649423de140 ON "user" (experiences_id)');
    }
}
