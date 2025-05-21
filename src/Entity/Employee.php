<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom est obligatoire")]
    #[Assert\Length(min: 2, max: 255, minMessage: "Le nom doit faire au moins {{ limit }} caractères", maxMessage: "Le nom ne peut pas faire plus de {{ limit }} caractères")]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "Le restaurant est obligatoire")]
    private ?Restaurant $restaurant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): static
    {
        $this->restaurant = $restaurant;

        return $this;
    }
}
 