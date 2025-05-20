<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Restaurant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestaurant(): ?string
    {
        return $this->Restaurant;
    }

    public function setRestaurant(string $Restaurant): static
    {
        $this->Restaurant = $Restaurant;

        return $this;
    }
}
