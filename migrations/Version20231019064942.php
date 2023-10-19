<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019064942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Avis (id INT AUTO_INCREMENT NOT NULL, montre_id INT DEFAULT NULL, Avis_id_id INT NOT NULL, note NUMERIC(10, 0) NOT NULL, commentaire VARCHAR(255) NOT NULL, INDEX IDX_8F91ABF01F3E1099 (montre_id), INDEX IDX_8F91ABF088C1F29 (Avis_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Commande (id INT AUTO_INCREMENT NOT NULL, userid_id INT NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', statut VARCHAR(255) NOT NULL, address_livraison VARCHAR(400) NOT NULL, frais_livraison DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67D58E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Fournisseur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Materiaux (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(120) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, annee_fabrication INT NOT NULL, garantie VARCHAR(255) NOT NULL, dimensions VARCHAR(255) NOT NULL, thumbnail VARCHAR(400) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_Commande (montre_id INT NOT NULL, Commande_id INT NOT NULL, INDEX IDX_5750B0071F3E1099 (montre_id), INDEX IDX_5750B00782EA2E54 (Commande_id), PRIMARY KEY(montre_id, Commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_Fournisseur (montre_id INT NOT NULL, Fournisseur_id INT NOT NULL, INDEX IDX_58D4C8C81F3E1099 (montre_id), INDEX IDX_58D4C8C8670C757F (Fournisseur_id), PRIMARY KEY(montre_id, Fournisseur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_Materiaux (montre_id INT NOT NULL, Materiaux_id INT NOT NULL, INDEX IDX_272C44111F3E1099 (montre_id), INDEX IDX_272C4411806EBBB2 (Materiaux_id), PRIMARY KEY(montre_id, Materiaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_Categories (montre_id INT NOT NULL, Categories_id INT NOT NULL, INDEX IDX_1BF75BFF1F3E1099 (montre_id), INDEX IDX_1BF75BFFA21214B7 (Categories_id), PRIMARY KEY(montre_id, Categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Avis ADD CONSTRAINT FK_8F91ABF01F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id)');
        $this->addSql('ALTER TABLE Avis ADD CONSTRAINT FK_8F91ABF088C1F29 FOREIGN KEY (Avis_id_id) REFERENCES Users (id)');
        $this->addSql('ALTER TABLE Commande ADD CONSTRAINT FK_6EEAA67D58E0A285 FOREIGN KEY (userid_id) REFERENCES Users (id)');
        $this->addSql('ALTER TABLE montre_Commande ADD CONSTRAINT FK_5750B0071F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_Commande ADD CONSTRAINT FK_5750B00782EA2E54 FOREIGN KEY (Commande_id) REFERENCES Commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_Fournisseur ADD CONSTRAINT FK_58D4C8C81F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_Fournisseur ADD CONSTRAINT FK_58D4C8C8670C757F FOREIGN KEY (Fournisseur_id) REFERENCES Fournisseur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_Materiaux ADD CONSTRAINT FK_272C44111F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_Materiaux ADD CONSTRAINT FK_272C4411806EBBB2 FOREIGN KEY (Materiaux_id) REFERENCES Materiaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_Categories ADD CONSTRAINT FK_1BF75BFF1F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_Categories ADD CONSTRAINT FK_1BF75BFFA21214B7 FOREIGN KEY (Categories_id) REFERENCES Categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Avis DROP FOREIGN KEY FK_8F91ABF01F3E1099');
        $this->addSql('ALTER TABLE Avis DROP FOREIGN KEY FK_8F91ABF088C1F29');
        $this->addSql('ALTER TABLE Commande DROP FOREIGN KEY FK_6EEAA67D58E0A285');
        $this->addSql('ALTER TABLE montre_Commande DROP FOREIGN KEY FK_5750B0071F3E1099');
        $this->addSql('ALTER TABLE montre_Commande DROP FOREIGN KEY FK_5750B00782EA2E54');
        $this->addSql('ALTER TABLE montre_Fournisseur DROP FOREIGN KEY FK_58D4C8C81F3E1099');
        $this->addSql('ALTER TABLE montre_Fournisseur DROP FOREIGN KEY FK_58D4C8C8670C757F');
        $this->addSql('ALTER TABLE montre_Materiaux DROP FOREIGN KEY FK_272C44111F3E1099');
        $this->addSql('ALTER TABLE montre_Materiaux DROP FOREIGN KEY FK_272C4411806EBBB2');
        $this->addSql('ALTER TABLE montre_Categories DROP FOREIGN KEY FK_1BF75BFF1F3E1099');
        $this->addSql('ALTER TABLE montre_Categories DROP FOREIGN KEY FK_1BF75BFFA21214B7');
        $this->addSql('DROP TABLE Avis');
        $this->addSql('DROP TABLE Categories');
        $this->addSql('DROP TABLE Commande');
        $this->addSql('DROP TABLE Fournisseur');
        $this->addSql('DROP TABLE Materiaux');
        $this->addSql('DROP TABLE montre');
        $this->addSql('DROP TABLE montre_Commande');
        $this->addSql('DROP TABLE montre_Fournisseur');
        $this->addSql('DROP TABLE montre_Materiaux');
        $this->addSql('DROP TABLE montre_Categories');
        $this->addSql('DROP TABLE product');
    }
}
