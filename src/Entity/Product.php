<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"product:read"}},
 *     denormalizationContext={"groups"={"product:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"titleProduct": "word_start"})
 * @ApiFilter(RangeFilter::class, properties={"priceProduct"})
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

    /**
     * @ORM\ManyToMany(targetEntity=Cart::class, inversedBy="products")
     *
     * @Groups("product:read")
     */
    private $idCartProduct;



    public function __construct()
    {
        $this->idCategoryProduct = new ArrayCollection();
        $this->idSupportProduct = new ArrayCollection();
        $this->idCartProduct = new ArrayCollection();
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

    /**
     * @return Collection|Cart[]
     */
    public function getIdCartProduct(): Collection
    {
        return $this->idCartProduct;
    }

    public function addIdCartProduct(Cart $idCartProduct): self
    {
        if (!$this->idCartProduct->contains($idCartProduct)) {
            $this->idCartProduct[] = $idCartProduct;
        }

        return $this;
    }

    public function removeIdCartProduct(Cart $idCartProduct): self
    {
        $this->idCartProduct->removeElement($idCartProduct);

        return $this;
    }
}
