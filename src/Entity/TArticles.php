<?php
declare(strict_types=1);

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * TArticles
 *
 * @ORM\Table(name="t_articles", indexes={@ORM\Index(name="t_articles_article_type_id_index", columns={"article_type_id"}), @ORM\Index(name="t_articles_tax_id_index", columns={"tax_id"})})
 * @ORM\Entity
 */
class TArticles
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
     * @var int|null
     *
     * @ORM\Column(name="article_type_id", type="integer", nullable=true)
     */
    private $articleTypeId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tax_id", type="integer", nullable=true)
     */
    private $taxId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_change_date", type="datetime", nullable=true)
     */
    private $lastChangeDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="activation_date", type="datetime", nullable=true)
     */
    private $activationDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleTypeId(): ?int
    {
        return $this->articleTypeId;
    }

    public function setArticleTypeId(?int $articleTypeId): self
    {
        $this->articleTypeId = $articleTypeId;

        return $this;
    }

    public function getTaxId(): ?int
    {
        return $this->taxId;
    }

    public function setTaxId(?int $taxId): self
    {
        $this->taxId = $taxId;

        return $this;
    }

    public function getCreationDate(): ?DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(?DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getLastChangeDate(): ?DateTimeInterface
    {
        return $this->lastChangeDate;
    }

    public function setLastChangeDate(?DateTimeInterface $lastChangeDate): self
    {
        $this->lastChangeDate = $lastChangeDate;

        return $this;
    }

    public function getActivationDate(): ?DateTimeInterface
    {
        return $this->activationDate;
    }

    public function setActivationDate(?DateTimeInterface $activationDate): self
    {
        $this->activationDate = $activationDate;

        return $this;
    }


}
