<?php

namespace App\Entity;

use App\Repository\DragonTraitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "traitType", type: "string")]
#[ORM\DiscriminatorMap(["breed" => "DragonBreed", "gene" => "Gene", "eyes" => "Eyes", "extra" => "Extra"])]
#[ORM\Entity(repositoryClass: DragonTraitRepository::class)]
class DragonTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\ManyToOne(targetEntity: ObtainingWay::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $obtainingWay;

    #[ORM\ManyToOne(targetEntity: Currency::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $currency;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getObtainingWay(): ?ObtainingWay
    {
        return $this->obtainingWay;
    }

    public function setObtainingWay(?ObtainingWay $obtainingWay): self
    {
        $this->obtainingWay = $obtainingWay;

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}
