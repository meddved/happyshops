<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TTitle
 *
 * @ORM\Table(name="t_title")
 * @ORM\Entity
 */
class TTitle
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_0", type="string", length=50, nullable=true)
     */
    private $title0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_1", type="string", length=50, nullable=true)
     */
    private $title1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_2", type="string", length=50, nullable=true)
     */
    private $title2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle0(): ?string
    {
        return $this->title0;
    }

    public function setTitle0(?string $title0): self
    {
        $this->title0 = $title0;

        return $this;
    }

    public function getTitle1(): ?string
    {
        return $this->title1;
    }

    public function setTitle1(?string $title1): self
    {
        $this->title1 = $title1;

        return $this;
    }

    public function getTitle2(): ?string
    {
        return $this->title2;
    }

    public function setTitle2(?string $title2): self
    {
        $this->title2 = $title2;

        return $this;
    }


}
