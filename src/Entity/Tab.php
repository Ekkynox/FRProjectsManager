<?php

namespace App\Entity;

use App\Repository\TabRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TabRepository::class)]
class Tab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $name;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'tabs')]
    #[ORM\JoinColumn(nullable: false)]
    private $account;

    #[ORM\OneToMany(mappedBy: 'tab', targetEntity: DragonProject::class)]
    private $dragonProjects;

    public function __construct()
    {
        $this->dragonProjects = new ArrayCollection();
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

    public function getAccount(): ?User
    {
        return $this->account;
    }

    public function setAccount(?User $account): self
    {
        $this->account = $account;

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
            $dragonProject->setTab($this);
        }

        return $this;
    }

    public function removeDragonProject(DragonProject $dragonProject): self
    {
        if ($this->dragonProjects->removeElement($dragonProject)) {
            // set the owning side to null (unless already changed)
            if ($dragonProject->getTab() === $this) {
                $dragonProject->setTab(null);
            }
        }

        return $this;
    }
}
