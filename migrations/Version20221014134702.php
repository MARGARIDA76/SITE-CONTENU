<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221014134702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, date_creation DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, mission_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', code_identification VARCHAR(255) NOT NULL, nationalite LONGTEXT NOT NULL, INDEX IDX_268B9C9DBE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cible (id INT AUTO_INCREMENT NOT NULL, mission_id INT NOT NULL, nom VARCHAR(255) NOT NULL,  prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', nom_code VARCHAR(255) NOT NULL, nationalite LONGTEXT NOT NULL, INDEX IDX_E15DEC3BBE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, mission_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', nom_code VARCHAR(255) NOT NULL, nationalite LONGTEXT NOT NULL, INDEX IDX_4C62E638BE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, titre_mission LONGTEXT NOT NULL, description_mission LONGTEXT NOT NULL, nom_code VARCHAR(255) NOT NULL, pays LONGTEXT NOT NULL, type_mission LONGTEXT NOT NULL, statut_mission LONGTEXT NOT NULL, specialite_requise LONGTEXT NOT NULL, date_debut DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', date_fin DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planque (id INT AUTO_INCREMENT NOT NULL, misssion_id INT NOT NULL, code_planque VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, pays LONGTEXT NOT NULL, type_planque LONGTEXT NOT NULL, INDEX IDX_4B3A04BA9D24C4A0 (misssion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, agent_id INT NOT NULL, specialite LONGTEXT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_E7D6FCC13414710B (agent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE cible ADD CONSTRAINT FK_E15DEC3BBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE planque ADD CONSTRAINT FK_4B3A04BA9D24C4A0 FOREIGN KEY (misssion_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC13414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DBE6CAE90');
        $this->addSql('ALTER TABLE cible DROP FOREIGN KEY FK_E15DEC3BBE6CAE90');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638BE6CAE90');
        $this->addSql('ALTER TABLE planque DROP FOREIGN KEY FK_4B3A04BA9D24C4A0');
        $this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_E7D6FCC13414710B');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE cible');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE planque');
        $this->addSql('DROP TABLE specialite');
    }
}
