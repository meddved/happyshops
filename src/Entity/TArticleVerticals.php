<?php
declare(strict_types=1);

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * TArticleVerticals
 *
 * @ORM\Table(name="t_article_verticals", indexes={@ORM\Index(name="article_reader_category_order", columns={"first_activation_date"}), @ORM\Index(name="article_reader_category_where", columns={"host_id", "best_price"}), @ORM\Index(name="host_id_index", columns={"host_id"}), @ORM\Index(name="subtitle_index", columns={"subtitle"}), @ORM\Index(name="t_article_verticals_article", columns={"article_id"}), @ORM\Index(name="t_article_verticals_slug_host_id_index", columns={"host_id"}), @ORM\Index(name="title_index", columns={"title"})})
 * @ORM\Entity
 */
class TArticleVerticals
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
     * @ORM\Column(name="article_id", type="integer", nullable=true)
     */
    private $articleId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="host_id", type="integer", nullable=true)
     */
    private $hostId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subtitle", type="string", length=200, nullable=true)
     */
    private $subtitle;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="best_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $bestPrice = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="special_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $specialPrice = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="first_activation_date", type="datetime", nullable=true)
     */
    private $firstActivationDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_activation_date", type="datetime", nullable=true)
     */
    private $lastActivationDate;

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
     * @var int|null
     *
     * @ORM\Column(name="erp_number", type="integer", nullable=true)
     */
    private $erpNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleId(): ?int
    {
        return $this->articleId;
    }

    public function setArticleId(?int $articleId): self
    {
        $this->articleId = $articleId;

        return $this;
    }

    public function getHostId(): ?int
    {
        return $this->hostId;
    }

    public function setHostId(?int $hostId): self
    {
        $this->hostId = $hostId;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getBestPrice(): ?float
    {
        return $this->bestPrice;
    }

    public function setBestPrice(float $bestPrice): self
    {
        $this->bestPrice = $bestPrice;

        return $this;
    }

    public function getSpecialPrice(): ?float
    {
        return $this->specialPrice;
    }

    public function setSpecialPrice(float $specialPrice): self
    {
        $this->specialPrice = $specialPrice;

        return $this;
    }

    public function getFirstActivationDate(): ?DateTimeInterface
    {
        return $this->firstActivationDate;
    }

    public function setFirstActivationDate(?DateTimeInterface $firstActivationDate): self
    {
        $this->firstActivationDate = $firstActivationDate;

        return $this;
    }

    public function getLastActivationDate(): ?DateTimeInterface
    {
        return $this->lastActivationDate;
    }

    public function setLastActivationDate(?DateTimeInterface $lastActivationDate): self
    {
        $this->lastActivationDate = $lastActivationDate;

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

    public function getErpNumber(): ?int
    {
        return $this->erpNumber;
    }

    public function setErpNumber(?int $erpNumber): self
    {
        $this->erpNumber = $erpNumber;

        return $this;
    }


}
