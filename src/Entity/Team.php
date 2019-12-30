<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reputation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $achievement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hero", mappedBy="team")
     */
    private $heroes;

    public function __construct()
    {
        $this->heroes = new ArrayCollection();
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

    public function getReputation(): ?int
    {
        return $this->reputation;
    }

    public function setReputation(?int $reputation): self
    {
        $this->reputation = $reputation;

        return $this;
    }

    public function getAchievement(): ?string
    {
        return $this->achievement;
    }

    public function setAchievement(?string $achievement): self
    {
        $this->achievement = $achievement;

        return $this;
    }

    /**
     * @return Collection|Hero[]
     */
    public function getHeroes(): Collection
    {
        return $this->heroes;
    }

    public function addHero(Hero $hero): self
    {
        if (!$this->heroes->contains($hero)) {
            $this->heroes[] = $hero;
            $hero->setTeam($this);
        }

        return $this;
    }

    public function removeHero(Hero $hero): self
    {
        if ($this->heroes->contains($hero)) {
            $this->heroes->removeElement($hero);
            // set the owning side to null (unless already changed)
            if ($hero->getTeam() === $this) {
                $hero->setTeam(null);
            }
        }

        return $this;
    }
}
