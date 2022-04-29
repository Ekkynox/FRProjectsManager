<?php

namespace App\Entity;

use App\Repository\ExtraRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraRepository::class)]
class Extra extends DragonTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: DragonProject::class, mappedBy: 'extras')]
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
            $dragonProject->addExtra($this);
        }

        return $this;
    }

    public function removeDragonProject(DragonProject $dragonProject): self
    {
        if ($this->dragonProjects->removeElement($dragonProject)) {
            $dragonProject->removeExtra($this);
        }

        return $this;
    }
}
