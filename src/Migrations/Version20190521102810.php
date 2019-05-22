<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190521102810 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE phytopharmarcie (id INT AUTO_INCREMENT NOT NULL, culture VARCHAR(255) NOT NULL, enemie VARCHAR(255) NOT NULL, nom_commercial VARCHAR(255) NOT NULL, societe VARCHAR(255) NOT NULL, matiere_active VARCHAR(255) NOT NULL, classe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user DROP role, DROP salt');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE phytopharmarcie');
        $this->addSql('ALTER TABLE user ADD role VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD salt VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
