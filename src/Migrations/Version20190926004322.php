<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190926004322 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE montage_projet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, niveau_etude VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, situation_familiale VARCHAR(255) NOT NULL, titre_projet VARCHAR(255) NOT NULL, nom_culture_animaux VARCHAR(255) NOT NULL, superficie_nombre_animaux VARCHAR(255) NOT NULL, capacite_transformation_ou_de_sechage VARCHAR(255) NOT NULL, date_debut_activite VARCHAR(255) NOT NULL, nom_structure VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, arrondissement VARCHAR(255) NOT NULL, distance_par_rapport_aroute VARCHAR(255) NOT NULL, service_sollicite VARCHAR(255) NOT NULL, autre_specification VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE montage_projet');
    }
}
