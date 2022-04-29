<?php

namespace App\Entity;

use App\Repository\GeneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "traitType", type: "string")]
#[ORM\DiscriminatorMap(["primary" => "PrimaryGene", "secondary" => "SecondaryGene", "tertiary" => "TertiaryGene"])]
#[ORM\Entity(repositoryClass: GeneRepository::class)]
class Gene extends DragonTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: GeneBreed::class, inversedBy: 'genes')]
    #[ORM\JoinColumn(nullable: false)]
    private $usableOn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsableOn(): ?GeneBreed
    {
        return $this->usableOn;
    }

    public function setUsableOn(?GeneBreed $usableOn): self
    {
        $this->usableOn = $usableOn;

        return $this;
    }
}
