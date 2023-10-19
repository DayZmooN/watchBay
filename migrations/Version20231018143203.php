<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018143203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE135BADC3D');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE1A42C301A');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE534B549B');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE33B32133');
        $this->addSql('ALTER TABLE products_Categories DROP FOREIGN KEY FK_E8ACBE766C8A81A9');
        $this->addSql('ALTER TABLE products_Categories DROP FOREIGN KEY FK_E8ACBE76A21214B7');
        $this->addSql('DROP TABLE Categories');
        $this->addSql('DROP TABLE magasin');
        $this->addSql('DROP TABLE order_line');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE products_Categories');
        $this->addSql('DROP TABLE Users');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, thumbnail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE magasin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, opening_time TIME NOT NULL, closing_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE order_line (id INT AUTO_INCREMENT NOT NULL, o_id_id INT NOT NULL, p_id_id INT NOT NULL, quantity INT DEFAULT NULL, INDEX IDX_9CE58EE1A42C301A (o_id_id), INDEX IDX_9CE58EE135BADC3D (p_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, uid_id INT NOT NULL, m_id_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status TINYINT(1) NOT NULL, pick_up TIME NOT NULL, INDEX IDX_E52FFDEE33B32133 (m_id_id), INDEX IDX_E52FFDEE534B549B (uid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, price NUMERIC(10, 2) NOT NULL, quantity INT DEFAULT NULL, thumbnail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_Categories (products_id INT NOT NULL, Categories_id INT NOT NULL, INDEX IDX_E8ACBE766C8A81A9 (products_id), INDEX IDX_E8ACBE76A21214B7 (Categories_id), PRIMARY KEY(products_id, Categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_verified TINYINT(1) NOT NULL, firstname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, adress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, birthday DATE DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE135BADC3D FOREIGN KEY (p_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE1A42C301A FOREIGN KEY (o_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE534B549B FOREIGN KEY (uid_id) REFERENCES Users (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE33B32133 FOREIGN KEY (m_id_id) REFERENCES magasin (id)');
        $this->addSql('ALTER TABLE products_Categories ADD CONSTRAINT FK_E8ACBE766C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_Categories ADD CONSTRAINT FK_E8ACBE76A21214B7 FOREIGN KEY (Categories_id) REFERENCES Categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }
}
