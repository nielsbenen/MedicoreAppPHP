<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $transportMethod;

    /**
     * @ORM\Column(type="integer")
     */
    private $travelDistance;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    private $workdaysPerWeek;

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

    public function getTransportMethod(): ?string
    {
        return $this->transportMethod;
    }

    public function setTransportMethod(string $transportMethod): self
    {
        $this->transportMethod = $transportMethod;

        return $this;
    }

    public function getTravelDistance(): ?int
    {
        return $this->travelDistance;
    }

    public function setTravelDistance(int $travelDistance): self
    {
        $this->travelDistance = $travelDistance;

        return $this;
    }

    public function getWorkdaysPerWeek(): ?string
    {
        return $this->workdaysPerWeek;
    }

    public function setWorkdaysPerWeek(string $workdaysPerWeek): self
    {
        $this->workdaysPerWeek = $workdaysPerWeek;

        return $this;
    }
}
