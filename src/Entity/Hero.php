<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\HeroRepository")
 */
class Hero
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
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gold;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $objects;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GameCharacter", inversedBy="heroes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $GameCharacter;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="heroes")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="heroes")
     */
    private $team;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(?int $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    public function getObjects(): ?string
    {
        return $this->objects;
    }

    public function setObjects(?string $objects): self
    {
        $this->objects = $objects;

        return $this;
    }

    public function getGameCharacter(): ?GameCharacter
    {
        return $this->GameCharacter;
    }

    public function setGameCharacter(?GameCharacter $GameCharacter): self
    {
        $this->GameCharacter = $GameCharacter;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addHero($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeHero($this);
        }

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }
}
