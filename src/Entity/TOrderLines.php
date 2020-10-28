<?php
declare(strict_types=1);

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * TOrderLines
 *
 * @ORM\Table(name="t_order_lines", indexes={@ORM\Index(name="FK_order_checkout_article_parent_line_id", columns={"checkout_article_parent_line_id"}), @ORM\Index(name="FK_t_order_lines_t_shipping_status", columns={"shipping_status_id"}), @ORM\Index(name="IX_article_host_date", columns={"article_id", "host_id", "created_at"}), @ORM\Index(name="IX_t_order_lines", columns={"orderID"})})
 * @ORM\Entity
 */
class TOrderLines
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
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true, options={"default"="1"})
     */
    private $quantity = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="taxID", type="integer", nullable=true)
     */
    private $taxid = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="article_id", type="integer", nullable=true)
     */
    private $articleId;

    /**
     * @var int
     *
     * @ORM\Column(name="host_id", type="integer", nullable=false, options={"default"="1"})
     */
    private $hostId = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $active = true;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="cancellation_date", type="datetime", nullable=true)
     */
    private $cancellationDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cancellation_status_id", type="integer", nullable=true)
     */
    private $cancellationStatusId;

    /**
     * @var float
     *
     * @ORM\Column(name="original_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $originalPrice = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_standalone_checkout_article", type="boolean", nullable=false)
     */
    private $isStandaloneCheckoutArticle = '0';

    /**
     * @var TOrderLines
     *
     * @ORM\ManyToOne(targetEntity="TOrderLines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="checkout_article_parent_line_id", referencedColumnName="ID")
     * })
     */
    private $checkoutArticleParentLine;

    /**
     * @var TShippingStatus
     *
     * @ORM\ManyToOne(targetEntity="TShippingStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipping_status_id", referencedColumnName="ID")
     * })
     */
    private $shippingStatus;

    /**
     * @var TOrders
     *
     * @ORM\ManyToOne(targetEntity="TOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orderID", referencedColumnName="ID")
     * })
     */
    private $orderid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTaxid(): ?int
    {
        return $this->taxid;
    }

    public function setTaxid(?int $taxid): self
    {
        $this->taxid = $taxid;

        return $this;
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

    public function setHostId(int $hostId): self
    {
        $this->hostId = $hostId;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCancellationDate(): ?DateTimeInterface
    {
        return $this->cancellationDate;
    }

    public function setCancellationDate(?DateTimeInterface $cancellationDate): self
    {
        $this->cancellationDate = $cancellationDate;

        return $this;
    }

    public function getCancellationStatusId(): ?int
    {
        return $this->cancellationStatusId;
    }

    public function setCancellationStatusId(?int $cancellationStatusId): self
    {
        $this->cancellationStatusId = $cancellationStatusId;

        return $this;
    }

    public function getOriginalPrice(): ?float
    {
        return $this->originalPrice;
    }

    public function setOriginalPrice(float $originalPrice): self
    {
        $this->originalPrice = $originalPrice;

        return $this;
    }

    public function getIsStandaloneCheckoutArticle(): ?bool
    {
        return $this->isStandaloneCheckoutArticle;
    }

    public function setIsStandaloneCheckoutArticle(bool $isStandaloneCheckoutArticle): self
    {
        $this->isStandaloneCheckoutArticle = $isStandaloneCheckoutArticle;

        return $this;
    }

    public function getCheckoutArticleParentLine(): ?self
    {
        return $this->checkoutArticleParentLine;
    }

    public function setCheckoutArticleParentLine(?self $checkoutArticleParentLine): self
    {
        $this->checkoutArticleParentLine = $checkoutArticleParentLine;

        return $this;
    }

    public function getShippingStatus(): ?TShippingStatus
    {
        return $this->shippingStatus;
    }

    public function setShippingStatus(?TShippingStatus $shippingStatus): self
    {
        $this->shippingStatus = $shippingStatus;

        return $this;
    }

    public function getOrderid(): ?TOrders
    {
        return $this->orderid;
    }

    public function setOrderid(?TOrders $orderid): self
    {
        $this->orderid = $orderid;

        return $this;
    }


}
