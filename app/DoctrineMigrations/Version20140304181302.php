<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140304181302 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE group_users (groupe_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_44AF8E8E7A45358C (groupe_id), INDEX IDX_44AF8E8EA76ED395 (user_id), PRIMARY KEY(groupe_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE groups_admins (groupe_id INT NOT NULL, admin_id INT NOT NULL, INDEX IDX_730AD1997A45358C (groupe_id), INDEX IDX_730AD199642B8210 (admin_id), PRIMARY KEY(groupe_id, admin_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE group_users ADD CONSTRAINT FK_44AF8E8E7A45358C FOREIGN KEY (groupe_id) REFERENCES Groupe (id)");
        $this->addSql("ALTER TABLE group_users ADD CONSTRAINT FK_44AF8E8EA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)");
        $this->addSql("ALTER TABLE groups_admins ADD CONSTRAINT FK_730AD1997A45358C FOREIGN KEY (groupe_id) REFERENCES Groupe (id)");
        $this->addSql("ALTER TABLE groups_admins ADD CONSTRAINT FK_730AD199642B8210 FOREIGN KEY (admin_id) REFERENCES fos_user (id)");
        $this->addSql("DROP TABLE users_group");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE users_group (groupe_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8AB7E08C7A45358C (groupe_id), INDEX IDX_8AB7E08CA76ED395 (user_id), PRIMARY KEY(groupe_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08CA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)");
        $this->addSql("ALTER TABLE users_group ADD CONSTRAINT FK_8AB7E08C7A45358C FOREIGN KEY (groupe_id) REFERENCES Groupe (id)");
        $this->addSql("DROP TABLE group_users");
        $this->addSql("DROP TABLE groups_admins");
    }
}
