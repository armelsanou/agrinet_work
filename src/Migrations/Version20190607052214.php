<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190607052214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliotheque (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command (id INT AUTO_INCREMENT NOT NULL, relation_id INT DEFAULT NULL, user_id INT DEFAULT NULL, nom_commercial VARCHAR(255) NOT NULL, quantite INT NOT NULL, point_de_livraison VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, INDEX IDX_8ECAEAD43256915B (relation_id), INDEX IDX_8ECAEAD4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devenir_expert (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone INT NOT NULL, statut_professionel VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, fonction_actuelle VARCHAR(255) NOT NULL, langue1 VARCHAR(255) NOT NULL, langue2 VARCHAR(255) DEFAULT NULL, secteur_activite1 VARCHAR(255) NOT NULL, secteur_activite2 VARCHAR(255) DEFAULT NULL, secteur_activite3 VARCHAR(255) DEFAULT NULL, competence1 VARCHAR(255) NOT NULL, competence2 VARCHAR(255) DEFAULT NULL, competence3 VARCHAR(255) DEFAULT NULL, autre LONGTEXT DEFAULT NULL, cv VARCHAR(255) NOT NULL, souhait_mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletters (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phytopharmarcie (id INT AUTO_INCREMENT NOT NULL, culture VARCHAR(255) NOT NULL, enemie VARCHAR(255) NOT NULL, nom_commercial VARCHAR(255) NOT NULL, societe VARCHAR(255) NOT NULL, matiere_active VARCHAR(255) NOT NULL, classe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recap_elevage (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, date DATETIME NOT NULL, activite VARCHAR(255) NOT NULL, duree VARCHAR(255) NOT NULL, nom_traitement VARCHAR(255) NOT NULL, quantite_traitement VARCHAR(255) NOT NULL, unite_traitement VARCHAR(255) NOT NULL, prix_traitement VARCHAR(255) NOT NULL, nom_alimentation VARCHAR(255) NOT NULL, quantite_alimentation VARCHAR(255) NOT NULL, prix_alimentation VARCHAR(255) NOT NULL, nom_complement VARCHAR(255) NOT NULL, quantite_complement VARCHAR(255) NOT NULL, prix_complement VARCHAR(255) NOT NULL, nombre_familial VARCHAR(255) NOT NULL, prix_valeur_familial VARCHAR(255) NOT NULL, nombre_employe VARCHAR(255) NOT NULL, cout_employe VARCHAR(255) NOT NULL, nombre_tacheron VARCHAR(255) NOT NULL, cout_tacheron VARCHAR(255) NOT NULL, transport VARCHAR(255) NOT NULL, autre VARCHAR(255) NOT NULL, sexe_animal VARCHAR(255) NOT NULL, INDEX IDX_9D44B2379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE upload (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, noms VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, numero_whatsapp INT NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD43256915B FOREIGN KEY (relation_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recap_elevage ADD CONSTRAINT FK_9D44B2379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD43256915B');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4A76ED395');
        $this->addSql('ALTER TABLE recap_elevage DROP FOREIGN KEY FK_9D44B2379F37AE5');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE bibliotheque');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE devenir_expert');
        $this->addSql('DROP TABLE newsletters');
        $this->addSql('DROP TABLE phytopharmarcie');
        $this->addSql('DROP TABLE recap_elevage');
        $this->addSql('DROP TABLE upload');
        $this->addSql('DROP TABLE user');
    }
}
