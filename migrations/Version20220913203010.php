<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220913203010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appart (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_journalier INT NOT NULL, nb_personne INT NOT NULL, nb_chambre INT NOT NULL, nb_coucharge INT NOT NULL, vues_panoramiques VARCHAR(255) NOT NULL, salle_bain VARCHAR(255) NOT NULL, chambre_linge VARCHAR(255) NOT NULL, divertissement VARCHAR(255) NOT NULL, famille VARCHAR(255) NOT NULL, chauffage_climatisation VARCHAR(255) NOT NULL, securite_maison VARCHAR(255) NOT NULL, internet_bureau VARCHAR(255) NOT NULL, cuisine_salle_manger VARCHAR(255) NOT NULL, carateriques_emplacement VARCHAR(255) NOT NULL, exterieur VARCHAR(255) NOT NULL, parking_installations VARCHAR(255) NOT NULL, services VARCHAR(255) NOT NULL, INDEX IDX_E3F3324912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appart ADD CONSTRAINT FK_E3F3324912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appart DROP FOREIGN KEY FK_E3F3324912469DE2');
        $this->addSql('DROP TABLE appart');
    }
}
