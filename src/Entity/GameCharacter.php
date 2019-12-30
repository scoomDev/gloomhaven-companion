<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\GameCharacterRepository")
 */
class GameCharacter
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
     * @ORM\Column(type="text")
     */
    private $bio;

    /**
     * @ORM\Column(type="text")
     */
    private $life;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxCard;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hero", mappedBy="GameCharacter")
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

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getLife(): ?string
    {
        return $this->life;
    }

    public function setLife(string $life): self
    {
        $this->life = $life;

        return $this;
    }

    public function getMaxCard(): ?int
    {
        return $this->maxCard;
    }

    public function setMaxCard(int $maxCard): self
    {
        $this->maxCard = $maxCard;

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
            $hero->setGameCharacter($this);
        }

        return $this;
    }

    public function removeHero(Hero $hero): self
    {
        if ($this->heroes->contains($hero)) {
            $this->heroes->removeElement($hero);
            // set the owning side to null (unless already changed)
            if ($hero->getGameCharacter() === $this) {
                $hero->setGameCharacter(null);
            }
        }

        return $this;
    }
}
