<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019105537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, montre_id INT DEFAULT NULL, avis_id_id INT NOT NULL, note NUMERIC(10, 0) NOT NULL, commentaire VARCHAR(255) NOT NULL, INDEX IDX_8F91ABF01F3E1099 (montre_id), INDEX IDX_8F91ABF088C1F29 (avis_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF01F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF088C1F29 FOREIGN KEY (avis_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE commande ADD userid_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D58E0A285 FOREIGN KEY (userid_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D58E0A285 ON commande (userid_id)');
        $this->addSql('ALTER TABLE montre ADD thumbnail VARCHAR(400) NOT NULL');
        $this->addSql('ALTER TABLE users ADD firstname VARCHAR(100) DEFAULT NULL, ADD is_verified TINYINT(1) NOT NULL, DROP name, CHANGE lastname lastname VARCHAR(100) DEFAULT NULL, CHANGE birthday birthday DATE DEFAULT NULL, CHANGE phone phone VARCHAR(10) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF01F3E1099');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF088C1F29');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D58E0A285');
        $this->addSql('DROP INDEX IDX_6EEAA67D58E0A285 ON commande');
        $this->addSql('ALTER TABLE commande DROP userid_id');
        $this->addSql('ALTER TABLE montre DROP thumbnail');
        $this->addSql('ALTER TABLE users ADD name VARCHAR(100) NOT NULL, DROP firstname, DROP is_verified, CHANGE lastname lastname VARCHAR(150) NOT NULL, CHANGE address address VARCHAR(255) NOT NULL, CHANGE phone phone VARCHAR(10) NOT NULL, CHANGE birthday birthday DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
