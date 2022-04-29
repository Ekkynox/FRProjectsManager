<?php

namespace App\Entity;

use App\Repository\GeneBreedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeneBreedRepository::class)]
class GeneBreed
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'usableOn', targetEntity: Gene::class)]
    private $genes;

    public function __construct()
    {
        $this->genes = new ArrayCollection();
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

    /**
     * @return Collection<int, Gene>
     */
    public function getGenes(): Collection
    {
        return $this->genes;
    }

    public function addGene(Gene $gene): self
    {
        if (!$this->genes->contains($gene)) {
            $this->genes[] = $gene;
            $gene->setUsableOn($this);
        }

        return $this;
    }

    public function removeGene(Gene $gene): self
    {
        if ($this->genes->removeElement($gene)) {
            // set the owning side to null (unless already changed)
            if ($gene->getUsableOn() === $this) {
                $gene->setUsableOn(null);
            }
        }

        return $this;
    }
}
