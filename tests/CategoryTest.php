<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testIsTrue()
    {
        $category = new Category();
        $product = new Product();

        $category->setNameCategory('name')
                 ->addProduct($product);

        $this->assertTrue($category->getNameCategory() === 'name');
        $this->assertContains($product, $category->getProducts());
    }

    public function testIsFalse()
    {
        $category = new Category();
        $product = new Product();

        $category->setNameCategory('name');

        $this->assertFalse($category->getNameCategory() === 'false');
        $this->assertNotContains(new Product, $category->getProducts());
    }

    public function testIsEmpty()
    {
        $category = new Category();

        $this->assertEmpty($category->getNameCategory());
        $this->assertEmpty($category->getProducts());
    }
}
