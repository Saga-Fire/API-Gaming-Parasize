<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\DeliveryOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use DateTimeInterface;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="Vous n'avez pas les droits d'accéder à cette ressource"
 *          },
 *          "post"={
 *              "security"="is_granted('ROLE_USER')",
 *              "security_message"="Vous devez être connecté pour poster une commande"
 *          }
 *      },
 *      itemOperations={
 *         "get"={
 *              "security"="is_granted('edit', object)",
 *              "security_message"="Vous n'avez pas les droits d'accéder à cette ressource"
 *          },
 *         "put"={
 *              "access_control"="is_granted('ROLE_ADMIN')",
 *              "security_message"="Vous n'avez pas les droits d'accéder à cette ressource"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_ADMIN')",
 *              "security_message"="Vous n'avez pas les droits d'accéder à cette ressource"
 *          }
 *      },
 *      normalizationContext={"groups"={
 *          "deliveryOrder:read", "user:read",
 *          "product:read", "order:read",
 *          "support:read", "category:read"
 *          }
 *      },
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
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
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
        $this->dateOrder = new \DateTime();
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
