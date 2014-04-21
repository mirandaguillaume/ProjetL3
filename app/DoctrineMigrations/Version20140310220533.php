<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140310220533 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE bibliotheque ADD CONSTRAINT FK_4690D34DEDAAC352 FOREIGN KEY (lien_id) REFERENCES lien (id)");
        $this->addSql("ALTER TABLE Lien DROP note_moyenne");
        $this->addSql("CREATE UNIQUE INDEX unique_credential ON Lien (nom)");
        $this->addSql("ALTER TABLE lien_user ADD CONSTRAINT FK_6E1E81A9EDAAC352 FOREIGN KEY (lien_id) REFERENCES lien (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE lien_user ADD CONSTRAINT FK_6E1E81A9A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP INDEX unique_credential ON lien");
        $this->addSql("ALTER TABLE lien ADD note_moyenne DOUBLE PRECISION NOT NULL");
        $this->addSql("ALTER TABLE bibliotheque DROP FOREIGN KEY FK_4690D34DEDAAC352");
        $this->addSql("ALTER TABLE lien_user DROP FOREIGN KEY FK_6E1E81A9EDAAC352");
        $this->addSql("ALTER TABLE lien_user DROP FOREIGN KEY FK_6E1E81A9A76ED395");
    }
}
