<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428181533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, id_user_cart_id INT NOT NULL, id_product_cart VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BA388B76119A6C7 (id_user_cart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_order (id INT AUTO_INCREMENT NOT NULL, id_cart_order_id INT NOT NULL, state_order VARCHAR(255) NOT NULL, date_order DATETIME NOT NULL, UNIQUE INDEX UNIQ_E522750AAD28F336 (id_cart_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_cart (product_id INT NOT NULL, cart_id INT NOT NULL, INDEX IDX_864BAA164584665A (product_id), INDEX IDX_864BAA161AD5CDBF (cart_id), PRIMARY KEY(product_id, cart_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipping_address (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, shipping_address_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D6494D4CFF2B (shipping_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B76119A6C7 FOREIGN KEY (id_user_cart_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE delivery_order ADD CONSTRAINT FK_E522750AAD28F336 FOREIGN KEY (id_cart_order_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE product_cart ADD CONSTRAINT FK_864BAA164584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_cart ADD CONSTRAINT FK_864BAA161AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494D4CFF2B FOREIGN KEY (shipping_address_id) REFERENCES shipping_address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery_order DROP FOREIGN KEY FK_E522750AAD28F336');
        $this->addSql('ALTER TABLE product_cart DROP FOREIGN KEY FK_864BAA161AD5CDBF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494D4CFF2B');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B76119A6C7');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE delivery_order');
        $this->addSql('DROP TABLE product_cart');
        $this->addSql('DROP TABLE shipping_address');
        $this->addSql('DROP TABLE user');
    }
}
