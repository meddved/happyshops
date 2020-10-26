<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TGeoCountries
 *
 * @ORM\Table(name="t_geo_countries")
 * @ORM\Entity
 */
class TGeoCountries
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_0", type="string", length=64, nullable=false)
     */
    private $name0;

    /**
     * @var string
     *
     * @ORM\Column(name="name_1", type="string", length=64, nullable=false)
     */
    private $name1;

    /**
     * @var string
     *
     * @ORM\Column(name="name_2", type="string", length=64, nullable=false)
     */
    private $name2;

    /**
     * @var string
     *
     * @ORM\Column(name="acronym", type="string", length=8, nullable=false)
     */
    private $acronym;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="in_checkout", type="boolean", nullable=true)
     */
    private $inCheckout;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alpha3_code", type="string", length=3, nullable=true)
     */
    private $alpha3Code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName0(): ?string
    {
        return $this->name0;
    }

    public function setName0(string $name0): self
    {
        $this->name0 = $name0;

        return $this;
    }

    public function getName1(): ?string
    {
        return $this->name1;
    }

    public function setName1(string $name1): self
    {
        $this->name1 = $name1;

        return $this;
    }

    public function getName2(): ?string
    {
        return $this->name2;
    }

    public function setName2(string $name2): self
    {
        $this->name2 = $name2;

        return $this;
    }

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    public function getInCheckout(): ?bool
    {
        return $this->inCheckout;
    }

    public function setInCheckout(?bool $inCheckout): self
    {
        $this->inCheckout = $inCheckout;

        return $this;
    }

    public function getAlpha3Code(): ?string
    {
        return $this->alpha3Code;
    }

    public function setAlpha3Code(?string $alpha3Code): self
    {
        $this->alpha3Code = $alpha3Code;

        return $this;
    }


}
