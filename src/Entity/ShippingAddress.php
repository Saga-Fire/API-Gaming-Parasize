<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ShippingAddressRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *     collectionOperations={},
 *     normalizationContext={"groups"={"order:read"}},
 *     denormalizationContext={"groups"={"order:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"name": "word_start", "lastName": "word_start", "zipCode" : "exact"})
 * @ORM\Entity(repositoryClass=ShippingAddressRepository::class)
 */
class ShippingAddress
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups("order:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"order:read", "order:write", "user:read", "user:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"order:read", "order:write", "user:read", "user:write"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"order:read", "order:write", "user:read", "user:write"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"order:read", "order:write", "user:read", "user:write"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Groups({"order:read", "order:write", "user:read", "user:write"})
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"order:read", "order:write", "user:read", "user:write"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"order:read", "order:write", "user:read", "user:write"})
     */
    private $country;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="shippingAddress", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setShippingAddress(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getShippingAddress() !== $this) {
            $user->setShippingAddress($this);
        }

        $this->user = $user;

        return $this;
    }
}
