<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012122145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD montre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF01F3E1099 FOREIGN KEY (montre_id) REFERENCES montre (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF01F3E1099 ON avis (montre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF01F3E1099');
        $this->addSql('DROP INDEX IDX_8F91ABF01F3E1099 ON avis');
        $this->addSql('ALTER TABLE avis DROP montre_id');
    }
}
