<?php

namespace App\Entity;

use App\Repository\DragonProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DragonProjectRepository::class)]
class DragonProject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $idFR;

    #[ORM\Column(type: 'text')]
    private $scryUrl;

    #[ORM\Column(type: 'boolean')]
    private $isComplete;

    #[ORM\ManyToOne(targetEntity: DragonBreed::class, inversedBy: 'dragonProjects')]
    #[ORM\JoinColumn(nullable: false)]
    private $breed;

    #[ORM\ManyToOne(targetEntity: PrimaryGene::class, inversedBy: 'dragonProjects')]
    #[ORM\JoinColumn(nullable: false)]
    private $primaryGene;

    #[ORM\ManyToOne(targetEntity: SecondaryGene::class, inversedBy: 'dragonProjects')]
    #[ORM\JoinColumn(nullable: false)]
    private $secondaryGene;

    #[ORM\ManyToOne(targetEntity: TertiaryGene::class, inversedBy: 'dragonProjects')]
    #[ORM\JoinColumn(nullable: false)]
    private $tertiaryGene;

    #[ORM\ManyToOne(targetEntity: Eyes::class, inversedBy: 'dragonProjects')]
    #[ORM\JoinColumn(nullable: false)]
    private $eyes;

    #[ORM\ManyToMany(targetEntity: Extra::class, inversedBy: 'dragonProjects')]
    private $extras;

    #[ORM\ManyToOne(targetEntity: Tab::class, inversedBy: 'dragonProjects')]
    #[ORM\JoinColumn(nullable: false)]
    private $tab;

    public function __construct()
    {
        $this->extras = new ArrayCollection();
    }

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

    public function getIdFR(): ?int
    {
        return $this->idFR;
    }

    public function setIdFR(int $idFR): self
    {
        $this->idFR = $idFR;

        return $this;
    }

    public function getScryUrl(): ?string
    {
        return $this->scryUrl;
    }

    public function setScryUrl(string $scryUrl): self
    {
        $this->scryUrl = $scryUrl;

        return $this;
    }

    public function getIsComplete(): ?bool
    {
        return $this->isComplete;
    }

    public function setIsComplete(bool $isComplete): self
    {
        $this->isComplete = $isComplete;

        return $this;
    }

    public function getBreed(): ?DragonBreed
    {
        return $this->breed;
    }

    public function setBreed(?DragonBreed $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getPrimaryGene(): ?PrimaryGene
    {
        return $this->primaryGene;
    }

    public function setPrimaryGene(?PrimaryGene $primaryGene): self
    {
        $this->primaryGene = $primaryGene;

        return $this;
    }

    public function getSecondaryGene(): ?SecondaryGene
    {
        return $this->secondaryGene;
    }

    public function setSecondaryGene(?SecondaryGene $secondaryGene): self
    {
        $this->secondaryGene = $secondaryGene;

        return $this;
    }

    public function getTertiaryGene(): ?TertiaryGene
    {
        return $this->tertiaryGene;
    }

    public function setTertiaryGene(?TertiaryGene $tertiaryGene): self
    {
        $this->tertiaryGene = $tertiaryGene;

        return $this;
    }

    public function getEyes(): ?Eyes
    {
        return $this->eyes;
    }

    public function setEyes(?Eyes $eyes): self
    {
        $this->eyes = $eyes;

        return $this;
    }

    /**
     * @return Collection<int, Extra>
     */
    public function getExtras(): Collection
    {
        return $this->extras;
    }

    public function addExtra(Extra $extra): self
    {
        if (!$this->extras->contains($extra)) {
            $this->extras[] = $extra;
        }

        return $this;
    }

    public function removeExtra(Extra $extra): self
    {
        $this->extras->removeElement($extra);

        return $this;
    }

    public function getTab(): ?Tab
    {
        return $this->tab;
    }

    public function setTab(?Tab $tab): self
    {
        $this->tab = $tab;

        return $this;
    }
}
