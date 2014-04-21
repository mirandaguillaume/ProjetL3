<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140304180306 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE Groupe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE users_group (groupe_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8AB7E08C7A45358C (groupe_id), INDEX IDX_8AB7E08CA76ED395 (user_id), PRIMARY KEY(groupe_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08C7A45358C FOREIGN KEY (groupe_id) REFERENCES Groupe (id)");
        $this->addSql("ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08CA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE users_group DROP FOREIGN KEY FK_8AB7E08C7A45358C");
        $this->addSql("DROP TABLE Groupe");
        $this->addSql("DROP TABLE users_group");
    }
}
