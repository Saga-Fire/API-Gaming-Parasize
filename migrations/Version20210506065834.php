<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506065834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE delivery_order_product (delivery_order_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_22C2EA06ECFE8C54 (delivery_order_id), INDEX IDX_22C2EA064584665A (product_id), PRIMARY KEY(delivery_order_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE delivery_order_product ADD CONSTRAINT FK_22C2EA06ECFE8C54 FOREIGN KEY (delivery_order_id) REFERENCES delivery_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE delivery_order_product ADD CONSTRAINT FK_22C2EA064584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE products');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products (delivery_order_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_B3BA5A5A4584665A (product_id), INDEX IDX_B3BA5A5AECFE8C54 (delivery_order_id), PRIMARY KEY(delivery_order_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AECFE8C54 FOREIGN KEY (delivery_order_id) REFERENCES delivery_order (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE delivery_order_product');
    }
}
