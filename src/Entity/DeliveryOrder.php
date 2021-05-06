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
 *     normalizationContext={"groups"={"deliveryOrder:read"}},
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
