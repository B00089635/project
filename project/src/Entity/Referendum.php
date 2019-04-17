<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReferendumRepository")
 */
class Referendum
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $details;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $votesFor;

    /**
     * @ORM\Column(type="integer")
     */
    private $votesAgainst;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getVotesAgainst(): ?int
    {
        return $this->votesAgainst;
    }

    public function setVotesAgainst(int $votesAgainst): self
    {
        $this->votesAgainst = $votesAgainst;

        return $this;
    }

    public function getVotesFor(): ?int
    {
        return $this->votesFor;
    }
    public function setVotesFor(int $votesFor): self
    {
        $this->votesFor = $votesFor;

        return $this;
    }

}
