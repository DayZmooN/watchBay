<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012111153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE montre_Commande (montre_id INT NOT NULL, Commande_id INT NOT NULL, INDEX IDX_5750B0071F3E1099 (montre_id), INDEX IDX_5750B00782EA2E54 (Commande_id), PRIMARY KEY(montre_id, Commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_Fournisseur (montre_id INT NOT NULL, Fournisseur_id INT NOT NULL, INDEX IDX_58D4C8C81F3E1099 (montre_id), INDEX IDX_58D4C8C8670C757F (Fournisseur_id), PRIMARY KEY(montre_id, Fournisseur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_Materiaux (montre_id INT NOT NULL, Materiaux_id INT NOT NULL, INDEX IDX_272C44111F3E1099 (montre_id), INDEX IDX_272C4411806EBBB2 (Materiaux_id), PRIMARY KEY(montre_id, Materiaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montre_Categories (montre_id INT NOT NULL, Categories_id INT NOT NULL, INDEX IDX_1BF75BFF1F3E1099 (montre_id), INDEX IDX_1BF75BFFA21214B7 (Categories_id), PRIMARY KEY(montre_id, Categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
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
        $this->addSql('ALTER TABLE montre_Commande DROP FOREIGN KEY FK_5750B0071F3E1099');
        $this->addSql('ALTER TABLE montre_Commande DROP FOREIGN KEY FK_5750B00782EA2E54');
        $this->addSql('ALTER TABLE montre_Fournisseur DROP FOREIGN KEY FK_58D4C8C81F3E1099');
        $this->addSql('ALTER TABLE montre_Fournisseur DROP FOREIGN KEY FK_58D4C8C8670C757F');
        $this->addSql('ALTER TABLE montre_Materiaux DROP FOREIGN KEY FK_272C44111F3E1099');
        $this->addSql('ALTER TABLE montre_Materiaux DROP FOREIGN KEY FK_272C4411806EBBB2');
        $this->addSql('ALTER TABLE montre_Categories DROP FOREIGN KEY FK_1BF75BFF1F3E1099');
        $this->addSql('ALTER TABLE montre_Categories DROP FOREIGN KEY FK_1BF75BFFA21214B7');
        $this->addSql('DROP TABLE montre_Commande');
        $this->addSql('DROP TABLE montre_Fournisseur');
        $this->addSql('DROP TABLE montre_Materiaux');
        $this->addSql('DROP TABLE montre_Categories');
    }
}
