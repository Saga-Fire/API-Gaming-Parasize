<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use App\Entity\ShippingAddress;
use App\Controller\ProfileAction;
use App\Controller\UserController;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use DateTimeInterface;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "get"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="Vous n'avez pas les droits d'accéder à cette ressource"
 *          },
 *          "post"={
 *              "denormalization_context"={"groups"={"user:write", "user:item:post"}},
 *              "validation_groups"={"create"}
 *          },
 *          "login"={
 *              "method"="POST",
 *              "normalization_context"={"groups"={"login:read"}},
 *              "openapi_context" = {
 *                  "summary" = "Se connecter"
 *              },
 *              "deserialize"=false,
 *              "path"="/login",
 *              "denormalization_context"={"groups"={"login:write"}}
 *          }
 *      },
 *      itemOperations={
 *          "get"={
 *              "security"="is_granted('edit', object)",
 *              "security_message"="Vous n'avez pas les droits d'accéder à cette ressource"
 *          },
 *          "patch"={
 *              "security"="is_granted('edit', object)",
 *              "security_message"="Vous n'avez pas les droits d'accéder à cette ressource",
 *              "denormalization_context"={"groups"={"user:write", "order:write", "user:item:post"}},
 *              "validation_groups"={"create"}
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_ADMIN')",
 *              "security_message"="Vous n'avez pas les droits d'accéder à cette ressource"
 *          }
 *      },
 *      normalizationContext={"groups"={"user:read", "order:read"}},
 *      denormalizationContext={"groups"={"user:write", "order:write"}}
 * )
 *
 * @UniqueEntity(
 *      fields={"email"},
 *      message="This {{ value }} is already use."
 * )
 *
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups({"user:read", "login:read", "user:item:profile:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Groups({"user:read", "user:write", "login:read", "login:write", "user:item:profile:read"})
     * @Assert\NotBlank(groups={"create"})
     * @Assert\Email(groups={"create"})
     */
    private $email;


    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Groups({"user:write", "login:read", "login:write"})
     *
     * @SerializedName("password")
     *
     * @Assert\NotBlank(groups={"create"})
     * @Assert\Length(
     *      groups={"create"},
     *      min = 8,
     *      max = 32,
     *      minMessage="Your password must be at lead {{ limit }} character long",
     *      maxMessage="Your password cannot be longer than {{ limit }} characters"
     * )
     * @Assert\Regex(
     *      groups={"create"},
     *      "/^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/",
     *      message = "Your password needs an uppercase, a lowercase, a digit and a special character"
     * )

     */
    private $plainPassword;

    /**
     * @ORM\OneToOne(targetEntity=ShippingAddress::class, inversedBy="user", cascade={"persist", "remove"})
     *
     * @Groups({"user:read", "user:write", "user:item:profile:read"})
     */
    private $shippingAddress;

    /**
     * @ORM\Column(type="json")
     *
     * @Groups("user:read")
     */
    private $roles = ['ROLE_USER'];

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     *
     * @Groups({"user:read", "user:item:profile:read"})
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryOrder::class, mappedBy="nameUserOrder", orphanRemoval=true)
     */
    private $deliveryOrders;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->shippingAddress = new ShippingAddress();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?ShippingAddress $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function getRoles(): ?array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getDeliveryOrders(): Collection
    {
        return $this->deliveryOrders;
    }

    public function addDeliveryOrder(User $user): self
    {
        if (!$this->deliveryOrders->contains($user)) {
            $this->deliveryOrders[] = $user;
            $user->setNameUserOrder($this);
        }

        return $this;
    }

    public function removeComment(User $user): self
    {
        if ($this->deliveryOrders->contains($user)) {
            $this->deliveryOrders->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getNameUserOrder() === $this) {
                $user->setNameUserOrder(null);
            }
        }

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function hasRoles(string $roles): bool
    {
        return in_array($roles, $this->roles);
    }
}
