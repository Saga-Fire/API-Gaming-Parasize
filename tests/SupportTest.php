<?php

namespace App\Tests;

use App\Entity\Support;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class SupportTest extends TestCase
{
    public function testIsTrue()
    {
        $support = new Support();
        $product = new Product();

        $support->setNameSupport('name')
                 ->addProduct($product);

        $this->assertTrue($support->getNameSupport() === 'name');
        $this->assertContains($product, $support->getProducts());
    }

    public function testIsFalse()
    {
        $support = new Support();
        $product = new Product();

        $support->setNameSupport('name');

        $this->assertFalse($support->getNameSupport() === 'false');
        $this->assertNotContains(new Product, $support->getProducts());
    }

    public function testIsEmpty()
    {
        $support = new Support();

        $this->assertEmpty($support->getProducts());
        $this->assertEmpty($support->getNameSupport());
    }
}
