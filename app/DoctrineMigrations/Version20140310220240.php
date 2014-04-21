<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140310220240 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE bibliotheque (user_id INT NOT NULL, lien_id INT NOT NULL, INDEX IDX_4690D34DA76ED395 (user_id), INDEX IDX_4690D34DEDAAC352 (lien_id), PRIMARY KEY(user_id, lien_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE lien_user (lien_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6E1E81A9EDAAC352 (lien_id), INDEX IDX_6E1E81A9A76ED395 (user_id), PRIMARY KEY(lien_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Liste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE bibliotheque ADD CONSTRAINT FK_4690D34DA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)");
        $this->addSql("ALTER TABLE bibliotheque ADD CONSTRAINT FK_4690D34DEDAAC352 FOREIGN KEY (lien_id) REFERENCES lien (id)");
        $this->addSql("ALTER TABLE lien_user ADD CONSTRAINT FK_6E1E81A9EDAAC352 FOREIGN KEY (lien_id) REFERENCES lien (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE lien_user ADD CONSTRAINT FK_6E1E81A9A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE Lien DROP note_moyenne");
        $this->addSql("CREATE UNIQUE INDEX unique_credential ON Lien (nom)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE bibliotheque");
        $this->addSql("DROP TABLE lien_user");
        $this->addSql("DROP TABLE tag");
        $this->addSql("DROP TABLE Liste");
        $this->addSql("DROP INDEX unique_credential ON lien");
        $this->addSql("ALTER TABLE lien ADD note_moyenne DOUBLE PRECISION NOT NULL");
    }
}
