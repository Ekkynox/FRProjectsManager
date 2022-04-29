<?php

namespace App\Entity;

use App\Repository\SecondaryGeneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecondaryGeneRepository::class)]
class SecondaryGene extends Gene
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'secondaryGene', targetEntity: DragonProject::class)]
    private $dragonProjects;

    public function __construct()
    {
        $this->dragonProjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, DragonProject>
     */
    public function getDragonProjects(): Collection
    {
        return $this->dragonProjects;
    }

    public function addDragonProject(DragonProject $dragonProject): self
    {
        if (!$this->dragonProjects->contains($dragonProject)) {
            $this->dragonProjects[] = $dragonProject;
            $dragonProject->setSecondaryGene($this);
        }

        return $this;
    }

    public function removeDragonProject(DragonProject $dragonProject): self
    {
        if ($this->dragonProjects->removeElement($dragonProject)) {
            // set the owning side to null (unless already changed)
            if ($dragonProject->getSecondaryGene() === $this) {
                $dragonProject->setSecondaryGene(null);
            }
        }

        return $this;
    }
}
