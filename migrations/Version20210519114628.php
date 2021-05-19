<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210519114628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name_category VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_64C19C12A9DEC0F (name_category), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_order (id INT AUTO_INCREMENT NOT NULL, name_user_order_id INT NOT NULL, date_order DATETIME NOT NULL, state_order VARCHAR(255) NOT NULL, INDEX IDX_E522750A3FF50DBE (name_user_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_order_product (delivery_order_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_22C2EA06ECFE8C54 (delivery_order_id), INDEX IDX_22C2EA064584665A (product_id), PRIMARY KEY(delivery_order_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, title_product VARCHAR(255) NOT NULL, description_product LONGTEXT NOT NULL, price_product DOUBLE PRECISION NOT NULL, picture_product VARCHAR(255) NOT NULL, stock_product INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_category (product_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_CDFC73564584665A (product_id), INDEX IDX_CDFC735612469DE2 (category_id), PRIMARY KEY(product_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_support (product_id INT NOT NULL, support_id INT NOT NULL, INDEX IDX_51DDF0154584665A (product_id), INDEX IDX_51DDF015315B405 (support_id), PRIMARY KEY(product_id, support_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipping_address (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support (id INT AUTO_INCREMENT NOT NULL, name_support VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8004EBA5886FAE1B (name_support), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, shipping_address_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6494D4CFF2B (shipping_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE delivery_order ADD CONSTRAINT FK_E522750A3FF50DBE FOREIGN KEY (name_user_order_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE delivery_order_product ADD CONSTRAINT FK_22C2EA06ECFE8C54 FOREIGN KEY (delivery_order_id) REFERENCES delivery_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE delivery_order_product ADD CONSTRAINT FK_22C2EA064584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC73564584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC735612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_support ADD CONSTRAINT FK_51DDF0154584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_support ADD CONSTRAINT FK_51DDF015315B405 FOREIGN KEY (support_id) REFERENCES support (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494D4CFF2B FOREIGN KEY (shipping_address_id) REFERENCES shipping_address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_category DROP FOREIGN KEY FK_CDFC735612469DE2');
        $this->addSql('ALTER TABLE delivery_order_product DROP FOREIGN KEY FK_22C2EA06ECFE8C54');
        $this->addSql('ALTER TABLE delivery_order_product DROP FOREIGN KEY FK_22C2EA064584665A');
        $this->addSql('ALTER TABLE product_category DROP FOREIGN KEY FK_CDFC73564584665A');
        $this->addSql('ALTER TABLE product_support DROP FOREIGN KEY FK_51DDF0154584665A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494D4CFF2B');
        $this->addSql('ALTER TABLE product_support DROP FOREIGN KEY FK_51DDF015315B405');
        $this->addSql('ALTER TABLE delivery_order DROP FOREIGN KEY FK_E522750A3FF50DBE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE delivery_order');
        $this->addSql('DROP TABLE delivery_order_product');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('DROP TABLE product_support');
        $this->addSql('DROP TABLE shipping_address');
        $this->addSql('DROP TABLE support');
        $this->addSql('DROP TABLE user');
    }
}
