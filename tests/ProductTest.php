<?php

namespace App\Tests;

use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Support;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIsTrue()
    {
        $product = new Product();
        $category = new Category();
        $support = new Support();

        $product->setTitleProduct('title')
             ->setDescriptionProduct('description')
             ->setPriceProduct(0.00)
             ->setPictureProduct('https://')
             ->addIdCategoryProduct($category)
             ->addIdSupportProduct($support)
             ->setStockProduct(0);

        $this->assertTrue($product->getTitleProduct() === 'title');
        $this->assertTrue($product->getDescriptionProduct() === 'description');
        $this->assertTrue($product->getPriceProduct() === 0.00);
        $this->assertTrue($product->getPictureProduct() === 'https://');
        $this->assertContains($category, $product->getIdCategoryProduct());
        $this->assertContains($support, $product->getIdSupportProduct());
        $this->assertTrue($product->getStockProduct() === 0);
    }

    public function testIsFalse()
    {
        $product = new Product();
        $category = new Category();
        $support = new Support();

        $product->setTitleProduct('title')
             ->setDescriptionProduct('description')
             ->setPriceProduct(0.00)
             ->setPictureProduct('https://')
             ->addIdCategoryProduct($category)
             ->addIdSupportProduct($support)
             ->setStockProduct(0);

        $this->assertFalse($product->getTitleProduct() === 'false');
        $this->assertFalse($product->getDescriptionProduct() === 'false');
        $this->assertFalse($product->getPriceProduct() === 1.00);
        $this->assertFalse($product->getPictureProduct() === 'false');
        $this->assertNotContains(new Category, $product->getIdCategoryProduct());
        $this->assertNotContains(new Support, $product->getIdSupportProduct());
        $this->assertFalse($product->getStockProduct() === 1);
    }

    public function testIsEmpty()
    {
        $product = new Product();

        $this->assertEmpty($product->getTitleProduct());
        $this->assertEmpty($product->getDescriptionProduct());
        $this->assertEmpty($product->getPriceProduct());
        $this->assertEmpty($product->getPictureProduct());
        $this->assertEmpty($product->getIdCategoryProduct());
        $this->assertEmpty($product->getIdSupportProduct());
        $this->assertEmpty($product->getStockProduct());
    }
}
