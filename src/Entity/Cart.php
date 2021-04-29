<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"cart:read"}},
 *     denormalizationContext={"groups"={"cart:write"}}
 * )
 * @ORM\Entity(repositoryClass=CartRepository::class)
 */
class Cart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups("cart:read")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="cart", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     *
     * @Groups({"cart:read", "cart:write", "user:read", "user:write"})
     */
    private $idUserCart;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @Groups({"cart:read", "cart:write", "product:read", "product:write"})
     */
    private $idProductCart;

    /**
     * @ORM\OneToOne(targetEntity=DeliveryOrder::class, mappedBy="idCartOrder", cascade={"persist", "remove"})
     *
     * @Groups({"cart:read", "cart:write"})
     */
    private $deliveryOrder;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="idCartProduct")
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

    public function getIdUserCart(): ?User
    {
        return $this->idUserCart;
    }

    public function setIdUserCart(User $idUserCart): self
    {
        $this->idUserCart = $idUserCart;

        return $this;
    }

    public function getIdProductCart(): ?int
    {
        return $this->idProductCart;
    }

    public function setIdProductCart(?int $idProductCart): self
    {
        $this->idProductCart = $idProductCart;

        return $this;
    }

    public function getDeliveryOrder(): ?DeliveryOrder
    {
        return $this->deliveryOrder;
    }

    public function setDeliveryOrder(DeliveryOrder $deliveryOrder): self
    {
        // set the owning side of the relation if necessary
        if ($deliveryOrder->getIdCartOrder() !== $this) {
            $deliveryOrder->setIdCartOrder($this);
        }

        $this->deliveryOrder = $deliveryOrder;

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
            $product->addIdCartProduct($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeIdCartProduct($this);
        }

        return $this;
    }


}
