<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DeliveryOrderRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"order:read"}},
 *     denormalizationContext={"groups"={"order:write"}}
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
     * @Groups("order:read")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Cart::class, inversedBy="deliveryOrder", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     *
     * @Groups({"order:read", "order:write", "cart:read", "cart:write"})
     */
    private $idCartOrder;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"order:read", "order:write"})
     */
    private $stateOrder;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Groups("order:read")
     */
    private $dateOrder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCartOrder(): ?Cart
    {
        return $this->idCartOrder;
    }

    public function setIdCartOrder(Cart $idCartOrder): self
    {
        $this->idCartOrder = $idCartOrder;

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

    public function getDateOrder(): ?\DateTimeInterface
    {
        return $this->dateOrder;
    }

    public function setDateOrder(\DateTimeInterface $dateOrder): self
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }
}
