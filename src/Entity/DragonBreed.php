<?php

namespace App\Entity;

use App\Repository\DragonBreedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DragonBreedRepository::class)]
class DragonBreed extends DragonTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $isAncient;

    #[ORM\OneToMany(mappedBy: 'breed', targetEntity: DragonProject::class)]
    private $dragonProjects;

    public function __construct()
    {
        $this->dragonProjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsAncient(): ?bool
    {
        return $this->isAncient;
    }

    public function setIsAncient(bool $isAncient): self
    {
        $this->isAncient = $isAncient;

        return $this;
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
            $dragonProject->setBreed($this);
        }

        return $this;
    }

    public function removeDragonProject(DragonProject $dragonProject): self
    {
        if ($this->dragonProjects->removeElement($dragonProject)) {
            // set the owning side to null (unless already changed)
            if ($dragonProject->getBreed() === $this) {
                $dragonProject->setBreed(null);
            }
        }

        return $this;
    }
}
