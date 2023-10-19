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
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, montre_id INT DEFAULT NULL, avis_id_id INT NOT NULL, note NUMERIC(10, 0) NOT NULL, commentaire VARCHAR(255) NOT NULL, INDEX IDX_8F91ABF01F3E1099 (montre_id), INDEX IDX_8F91ABF088C1F29 (avis_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, userid_id INT NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', statut VARCHAR(255) NOT NULL, address_livraison VARCHAR(400) NOT NULL, frais_livraison DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67D58E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiaux (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(120) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, annee_fabrication INT NOT NULL, garantie VARCHAR(255) NOT NULL, dimensions VARCHAR(255) NOT NULL, thumbnail VARCHAR(400) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_commande (montre_id INT NOT NULL, commande_id INT NOT NULL, INDEX IDX_5750B0071F3E1099 (montre_id), INDEX IDX_5750B00782EA2E54 (commande_id), PRIMARY KEY(montre_id, commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_fournisseur (montre_id INT NOT NULL, fournisseur_id INT NOT NULL, INDEX IDX_58D4C8C81F3E1099 (montre_id), INDEX IDX_58D4C8C8670C757F (fournisseur_id), PRIMARY KEY(montre_id, fournisseur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_materiaux (montre_id INT NOT NULL, materiaux_id INT NOT NULL, INDEX IDX_272C44111F3E1099 (montre_id), INDEX IDX_272C4411806EBBB2 (materiaux_id), PRIMARY KEY(montre_id, materiaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_categories (montre_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_1BF75BFF1F3E1099 (montre_id), INDEX IDX_1BF75BFFA21214B7 (categories_id), PRIMARY KEY(montre_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF01F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF088C1F29 FOREIGN KEY (avis_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D58E0A285 FOREIGN KEY (userid_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE montre_commande ADD CONSTRAINT FK_5750B0071F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_commande ADD CONSTRAINT FK_5750B00782EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_fournisseur ADD CONSTRAINT FK_58D4C8C81F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_fournisseur ADD CONSTRAINT FK_58D4C8C8670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_materiaux ADD CONSTRAINT FK_272C44111F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_materiaux ADD CONSTRAINT FK_272C4411806EBBB2 FOREIGN KEY (materiaux_id) REFERENCES materiaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_categories ADD CONSTRAINT FK_1BF75BFF1F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montre_categories ADD CONSTRAINT FK_1BF75BFFA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF01F3E1099');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF088C1F29');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D58E0A285');
        $this->addSql('ALTER TABLE montre_commande DROP FOREIGN KEY FK_5750B0071F3E1099');
        $this->addSql('ALTER TABLE montre_commande DROP FOREIGN KEY FK_5750B00782EA2E54');
        $this->addSql('ALTER TABLE montre_fournisseur DROP FOREIGN KEY FK_58D4C8C81F3E1099');
        $this->addSql('ALTER TABLE montre_fournisseur DROP FOREIGN KEY FK_58D4C8C8670C757F');
        $this->addSql('ALTER TABLE montre_materiaux DROP FOREIGN KEY FK_272C44111F3E1099');
        $this->addSql('ALTER TABLE montre_materiaux DROP FOREIGN KEY FK_272C4411806EBBB2');
        $this->addSql('ALTER TABLE montre_categories DROP FOREIGN KEY FK_1BF75BFF1F3E1099');
        $this->addSql('ALTER TABLE montre_categories DROP FOREIGN KEY FK_1BF75BFFA21214B7');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE materiaux');
        $this->addSql('DROP TABLE montre');
        $this->addSql('DROP TABLE montre_commande');
        $this->addSql('DROP TABLE montre_fournisseur');
        $this->addSql('DROP TABLE montre_materiaux');
        $this->addSql('DROP TABLE montre_categories');
        $this->addSql('DROP TABLE product');
    }
}
