<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012115534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Commande ADD userid_id INT NOT NULL');
        $this->addSql('ALTER TABLE Commande ADD CONSTRAINT FK_6EEAA67D58E0A285 FOREIGN KEY (userid_id) REFERENCES Users (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D58E0A285 ON Commande (userid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Commande DROP FOREIGN KEY FK_6EEAA67D58E0A285');
        $this->addSql('DROP INDEX IDX_6EEAA67D58E0A285 ON Commande');
        $this->addSql('ALTER TABLE Commande DROP userid_id');
    }
}
