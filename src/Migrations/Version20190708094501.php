<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708094501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE agri_finance_categorie (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agri_finance_structure (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT NOT NULL, structure VARCHAR(255) NOT NULL, INDEX IDX_E0B5D46B9F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agri_finance_structure ADD CONSTRAINT FK_E0B5D46B9F34925F FOREIGN KEY (id_categorie_id) REFERENCES agri_finance_categorie (id)');
        $this->addSql('ALTER TABLE variete_races_caracteristique ADD CONSTRAINT FK_35D85A7D0DCC9C FOREIGN KEY (id_bibliotheque_recherche_id) REFERENCES bibliotheque_recherche (id)');
        $this->addSql('CREATE INDEX IDX_35D85A7D0DCC9C ON variete_races_caracteristique (id_bibliotheque_recherche_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE agri_finance_structure DROP FOREIGN KEY FK_E0B5D46B9F34925F');
        $this->addSql('DROP TABLE agri_finance_categorie');
        $this->addSql('DROP TABLE agri_finance_structure');
        $this->addSql('ALTER TABLE variete_races_caracteristique DROP FOREIGN KEY FK_35D85A7D0DCC9C');
        $this->addSql('DROP INDEX IDX_35D85A7D0DCC9C ON variete_races_caracteristique');
    }
}
