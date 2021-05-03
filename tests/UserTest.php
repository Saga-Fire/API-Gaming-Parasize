<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\ShippingAddress;
use ContainerD4ppAZm\getShippingAddressRepositoryService;
use DateTime;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();
        $address = new ShippingAddress();
        $dateTime = new DateTime();

        $user->setEmail('true@test.com')
             ->setPlainPassword('password')
             ->setShippingAddress($address)
             ->setRoles(['admin'])
             ->setCreatedAt($dateTime);

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getPlainPassword() === 'password');
        $this->assertTrue($user->getShippingAddress() === $address);
        $this->assertTrue($user->getRoles() === ['admin']);
        $this->assertTrue($user->getCreatedAt() === $dateTime);
    }

    public function testIsFalse()
    {
        $user = new User();
        $address = new ShippingAddress();
        $dateTime = new DateTime();

        $user->setEmail('true@test.com')
             ->setPlainPassword('password')
             ->setShippingAddress($address)
             ->setRoles(['admin'])
             ->setCreatedAt($dateTime);

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getPlainPassword() === 'false');
        $this->assertFalse($user->getShippingAddress() === new ShippingAddress());
        $this->assertFalse($user->getRoles() === ['false']);
        $this->assertFalse($user->getCreatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPlainPassword());
        $this->assertEmpty($user->getShippingAddress());
        $this->assertEmpty($user->getRoles());
        $this->assertEmpty($user->getCreatedAt());
    }
}
