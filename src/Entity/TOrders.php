<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * TOrders
 *
 * @ORM\Table(name="t_orders", indexes={@ORM\Index(name="Billing_Address", columns={"billing_address_id"}), @ORM\Index(name="Delivery_Address", columns={"delivery_address_id"}), @ORM\Index(name="FK_t_orders_t_billing_status", columns={"billing_status_id"}), @ORM\Index(name="t_orders_active", columns={"active"})})
 * @ORM\Entity
 */
class TOrders
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
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="host_id", type="integer", nullable=true)
     */
    private $hostId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="cancellation_date", type="datetime", nullable=true)
     */
    private $cancellationDate;

    /**
     * @var TAddress
     *
     * @ORM\ManyToOne(targetEntity="TAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="billing_address_id", referencedColumnName="ID")
     * })
     */
    private $billingAddress;

    /**
     * @var TAddress
     *
     * @ORM\ManyToOne(targetEntity="TAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="delivery_address_id", referencedColumnName="ID")
     * })
     */
    private $deliveryAddress;

    /**
     * @var TBillingStatus
     *
     * @ORM\ManyToOne(targetEntity="TBillingStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="billing_status_id", referencedColumnName="ID")
     * })
     */
    private $billingStatus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

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

    public function getHostId(): ?int
    {
        return $this->hostId;
    }

    public function setHostId(?int $hostId): self
    {
        $this->hostId = $hostId;

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

    public function getBillingAddress(): ?TAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?TAddress $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getDeliveryAddress(): ?TAddress
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress(?TAddress $deliveryAddress): self
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    public function getBillingStatus(): ?TBillingStatus
    {
        return $this->billingStatus;
    }

    public function setBillingStatus(?TBillingStatus $billingStatus): self
    {
        $this->billingStatus = $billingStatus;

        return $this;
    }
}
