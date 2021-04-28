<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"product:read"}},
 *     denormalizationContext={"groups"={"product:write"}}
 * )
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups("product:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"product:read", "product:write"})
     */
    private $titleProduct;

    /**
     * @ORM\Column(type="text")
     *
     * @Groups({"product:read", "product:write"})
     */
    private $descriptionProduct;

    /**
     * @ORM\Column(type="float")
     *
     * @Groups({"product:read", "product:write"})
     */
    private $priceProduct;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"product:read", "product:write"})
     */
    private $pictureProduct;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="products", cascade="persist")
     *
     * @Groups({"product:read", "product:write"})
     */
    private $idCategoryProduct;

    /**
     * @ORM\ManyToMany(targetEntity=Support::class, inversedBy="products", cascade="persist")
     *
     * @Groups({"product:read", "product:write"})
     */
    private $idSupportProduct;

    /**
     * @ORM\Column(type="integer")
     *
     * @Groups({"product:read", "product:write"})
     */
    private $stockProduct;

    public function __construct()
    {
        $this->idCategoryProduct = new ArrayCollection();
        $this->idSupportProduct = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleProduct(): ?string
    {
        return $this->titleProduct;
    }

    public function setTitleProduct(string $titleProduct): self
    {
        $this->titleProduct = $titleProduct;

        return $this;
    }

    public function getDescriptionProduct(): ?string
    {
        return $this->descriptionProduct;
    }

    public function setDescriptionProduct(string $descriptionProduct): self
    {
        $this->descriptionProduct = $descriptionProduct;

        return $this;
    }

    public function getPriceProduct(): ?float
    {
        return $this->priceProduct;
    }

    public function setPriceProduct(float $priceProduct): self
    {
        $this->priceProduct = $priceProduct;

        return $this;
    }

    public function getPictureProduct(): ?string
    {
        return $this->pictureProduct;
    }

    public function setPictureProduct(string $pictureProduct): self
    {
        $this->pictureProduct = $pictureProduct;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getIdCategoryProduct(): Collection
    {
        return $this->idCategoryProduct;
    }

    public function addIdCategoryProduct(Category $idCategoryProduct): self
    {
        if (!$this->idCategoryProduct->contains($idCategoryProduct)) {
            $this->idCategoryProduct[] = $idCategoryProduct;
        }

        return $this;
    }

    public function removeIdCategoryProduct(Category $idCategoryProduct): self
    {
        $this->idCategoryProduct->removeElement($idCategoryProduct);

        return $this;
    }

    /**
     * @return Collection|Support[]
     */
    public function getIdSupportProduct(): Collection
    {
        return $this->idSupportProduct;
    }

    public function addIdSupportProduct(Support $idSupportProduct): self
    {
        if (!$this->idSupportProduct->contains($idSupportProduct)) {
            $this->idSupportProduct[] = $idSupportProduct;
        }

        return $this;
    }

    public function removeIdSupportProduct(Support $idSupportProduct): self
    {
        $this->idSupportProduct->removeElement($idSupportProduct);

        return $this;
    }

    public function getStockProduct(): ?int
    {
        return $this->stockProduct;
    }

    public function setStockProduct(int $stockProduct): self
    {
        $this->stockProduct = $stockProduct;

        return $this;
    }
}
