<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190523140017 extends AbstractMigration
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
        $this->addSql('CREATE TABLE phytopharmarcie (id INT AUTO_INCREMENT NOT NULL, culture VARCHAR(255) NOT NULL, enemie VARCHAR(255) NOT NULL, nom_commercial VARCHAR(255) NOT NULL, societe VARCHAR(255) NOT NULL, matiere_active VARCHAR(255) NOT NULL, classe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recap_elevage (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, date DATETIME NOT NULL, activite VARCHAR(255) NOT NULL, duree VARCHAR(255) NOT NULL, nom_traitement VARCHAR(255) NOT NULL, quantite_traitement VARCHAR(255) NOT NULL, unite_traitement VARCHAR(255) NOT NULL, prix_traitement VARCHAR(255) NOT NULL, nom_alimentation VARCHAR(255) NOT NULL, quantite_alimentation VARCHAR(255) NOT NULL, prix_alimentation VARCHAR(255) NOT NULL, nom_complement VARCHAR(255) NOT NULL, quantite_complement VARCHAR(255) NOT NULL, prix_complement VARCHAR(255) NOT NULL, nombre_familial VARCHAR(255) NOT NULL, prix_valeur_familial VARCHAR(255) NOT NULL, nombre_employe VARCHAR(255) NOT NULL, cout_employe VARCHAR(255) NOT NULL, nombre_tacheron VARCHAR(255) NOT NULL, cout_tacheron VARCHAR(255) NOT NULL, transport VARCHAR(255) NOT NULL, autre VARCHAR(255) NOT NULL, sexe_animal VARCHAR(255) NOT NULL, INDEX IDX_9D44B2379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, noms VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, numero INT NOT NULL, numero_whatsapp INT NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recap_elevage ADD CONSTRAINT FK_9D44B2379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recap_elevage DROP FOREIGN KEY FK_9D44B2379F37AE5');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE phytopharmarcie');
        $this->addSql('DROP TABLE recap_elevage');
        $this->addSql('DROP TABLE user');
    }
}
