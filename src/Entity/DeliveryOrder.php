<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DeliveryOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={
 *     "deliveryOrder:read", "user:read", "product:read", "order:read", "support:read", "category:read"}},
 *     denormalizationContext={"groups"={"deliveryOrder:write"}}
 * )
 * @ORM\Entity(repositoryClass=DeliveryOrderRepository::class)
 */
class DeliveryOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups("deliveryOrder:read")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="deliveryOrders")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Groups({"deliveryOrder:read", "deliveryOrder:write"})
     */
    private $nameUserOrder;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Groups({"deliveryOrder:read", "deliveryOrder:write"})
     */
    private $dateOrder;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"deliveryOrder:read", "deliveryOrder:write"})
     */
    private $stateOrder;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="deliveryOrders", cascade="persist")
     *
     * @Groups({"deliveryOrder:read", "deliveryOrder:write"})
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameUserOrder(): ?User
    {
        return $this->nameUserOrder;
    }

    public function setNameUserOrder(?User $nameUserOrder): self
    {
        $this->nameUserOrder = $nameUserOrder;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addDeliveryOrder($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeDeliveryOrder($this);
        }

        return $this;
    }

    public function getDateOrder(): ?\DateTimeInterface
    {
        return $this->dateOrder;
    }

    public function setDateOrder(\DateTimeInterface $dateOrder): self
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }

    public function getStateOrder(): ?string
    {
        return $this->stateOrder;
    }

    public function setStateOrder(string $stateOrder): self
    {
        $this->stateOrder = $stateOrder;

        return $this;
    }
}
