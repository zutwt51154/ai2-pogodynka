<?php

namespace App\Entity;

use App\Repository\ForecastRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForecastRepository::class)]
class Forecast
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $temperature = null;

    #[ORM\Column]
    private ?float $cloudiness = null;

    #[ORM\Column(nullable: true)]
    private ?int $wind_speed = null;

    #[ORM\Column(nullable: true)]
    private ?int $wind_direction = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'forecasts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getFahrenheit(): ?string
    {
        return $this->temperature*9/5+32;
    }

    public function getCloudiness(): ?float
    {
        return $this->cloudiness;
    }

    public function setCloudiness(float $cloudiness): static
    {
        $this->cloudiness = $cloudiness;

        return $this;
    }

    public function getWindSpeed(): ?int
    {
        return $this->wind_speed;
    }

    public function setWindSpeed(?int $wind_speed): static
    {
        $this->wind_speed = $wind_speed;

        return $this;
    }

    public function getWindDirection(): ?int
    {
        return $this->wind_direction;
    }

    public function setWindDirection(?int $wind_direction): static
    {
        $this->wind_direction = $wind_direction;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }
}
