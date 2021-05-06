<?php

namespace App\Tests;

use App\Entity\DeliveryOrder;
use App\Entity\User;
use App\Entity\Product;
use ContainerD4ppAZm\getShippingAddressRepositoryService;
use DateTime;
use PHPUnit\Framework\TestCase;

class DeliveryOrderTest extends TestCase
{
    public function testIsTrue()
    {
        $deliveryOrder = new DeliveryOrder();
        $user = new User();
        $product = new Product();
        $dateTime = new DateTime();

        $deliveryOrder->setNameUserOrder($user)
                      ->addProduct($product)
                      ->setDateOrder($dateTime)
                      ->setStateOrder("state");

        $this->assertTrue($deliveryOrder->getNameUserOrder() === $user);
        $this->assertContains($product, $deliveryOrder->getProducts());
        $this->assertTrue($deliveryOrder->getDateOrder() === $dateTime);
        $this->assertTrue($deliveryOrder->getStateOrder() === "state");
    }

    public function testIsFalse()
    {
        $deliveryOrder = new DeliveryOrder();
        $user = new User();
        $product = new Product();
        $dateTime = new DateTime();

        $deliveryOrder->setNameUserOrder($user)
                      ->addProduct($product)
                      ->setDateOrder($dateTime)
                      ->setStateOrder("state");

        $this->assertFalse($deliveryOrder->getNameUserOrder() === new User());
        $this->assertNotContains(new Product, $deliveryOrder->getProducts());
        $this->assertFalse($deliveryOrder->getDateOrder() === new DateTime());
        $this->assertFalse($deliveryOrder->getStateOrder() === "false");
    }

    public function testIsEmpty()
    {
        $deliveryOrder = new DeliveryOrder();

        $this->assertEmpty($deliveryOrder->getNameUserOrder());
        $this->assertEmpty($deliveryOrder->getProducts());
        $this->assertEmpty($deliveryOrder->getDateOrder());
        $this->assertEmpty($deliveryOrder->getStateOrder());
    }
}