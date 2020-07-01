<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 * @ORM\Table(name="client")
 */
class Client
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $cagnotte;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaires;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCagnotte(): ?string
    {
        return $this->cagnotte;
    }

    public function setCagnotte(string $cagnotte): self
    {
        $this->cagnotte = $cagnotte;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }
}
