<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TLanguages
 *
 * @ORM\Table(name="t_languages")
 * @ORM\Entity
 */
class TLanguages
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="short", type="string", length=10, nullable=true)
     */
    private $short;

    /**
     * @var string|null
     *
     * @ORM\Column(name="short_iso", type="string", length=10, nullable=true)
     */
    private $shortIso;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getShort(): ?string
    {
        return $this->short;
    }

    public function setShort(?string $short): self
    {
        $this->short = $short;

        return $this;
    }

    public function getShortIso(): ?string
    {
        return $this->shortIso;
    }

    public function setShortIso(?string $shortIso): self
    {
        $this->shortIso = $shortIso;

        return $this;
    }


}
