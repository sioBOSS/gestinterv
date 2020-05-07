<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterventionRepository")
 */
class Intervention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $deposit_date;

    /**
     * @ORM\Column(type="date")
     */
    private $return_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="text")
     */
    private $observations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="interventions")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Technician", inversedBy="interventions")
     */
    private $technician;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\OperatingSystem", inversedBy="interventions")
     */
    private $operating_system;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\InterventionType", inversedBy="interventions")
     */
    private $intervention_type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Material", inversedBy="interventions")
     */
    private $materials;

    public function __construct()
    {
        $this->intervention_type = new ArrayCollection();
        $this->materials = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepositDate(): ?\DateTimeInterface
    {
        return $this->deposit_date;
    }

    public function setDepositDate(\DateTimeInterface $deposit_date): self
    {
        $this->deposit_date = $deposit_date;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->return_date;
    }

    public function setReturnDate(\DateTimeInterface $return_date): self
    {
        $this->return_date = $return_date;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTechnician(): ?technician
    {
        return $this->technician;
    }

    public function setTechnician(?technician $technician): self
    {
        $this->technician = $technician;

        return $this;
    }

    public function getOperatingSystem(): ?OperatingSystem
    {
        return $this->operating_system;
    }

    public function setOperatingSystem(?OperatingSystem $operating_system): self
    {
        $this->operating_system = $operating_system;

        return $this;
    }

    /**
     * @return Collection|InterventionType[]
     */
    public function getInterventionType(): Collection
    {
        return $this->intervention_type;
    }

    public function addInterventionType(InterventionType $interventionType): self
    {
        if (!$this->intervention_type->contains($interventionType)) {
            $this->intervention_type[] = $interventionType;
        }

        return $this;
    }

    public function removeInterventionType(InterventionType $interventionType): self
    {
        if ($this->intervention_type->contains($interventionType)) {
            $this->intervention_type->removeElement($interventionType);
        }

        return $this;
    }

    /**
     * @return Collection|material[]
     */
    public function getMaterials(): Collection
    {
        return $this->materials;
    }

    public function addMaterial(material $material): self
    {
        if (!$this->materials->contains($material)) {
            $this->materials[] = $material;
        }

        return $this;
    }

    public function removeMaterial(material $material): self
    {
        if ($this->materials->contains($material)) {
            $this->materials->removeElement($material);
        }

        return $this;
    }
}
