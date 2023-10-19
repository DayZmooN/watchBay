<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012122600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Avis ADD Avis_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE Avis ADD CONSTRAINT FK_8F91ABF088C1F29 FOREIGN KEY (Avis_id_id) REFERENCES Users (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF088C1F29 ON Avis (Avis_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Avis DROP FOREIGN KEY FK_8F91ABF088C1F29');
        $this->addSql('DROP INDEX IDX_8F91ABF088C1F29 ON Avis');
        $this->addSql('ALTER TABLE Avis DROP Avis_id_id');
    }
}
