<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TBillingStatus
 *
 * @ORM\Table(name="t_billing_status")
 * @ORM\Entity
 */
class TBillingStatus
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
     * @ORM\Column(name="status_0", type="string", length=50, nullable=true)
     */
    private $status0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status_1", type="string", length=50, nullable=true)
     */
    private $status1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status_2", type="string", length=50, nullable=true)
     */
    private $status2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus0(): ?string
    {
        return $this->status0;
    }

    public function setStatus0(?string $status0): self
    {
        $this->status0 = $status0;

        return $this;
    }

    public function getStatus1(): ?string
    {
        return $this->status1;
    }

    public function setStatus1(?string $status1): self
    {
        $this->status1 = $status1;

        return $this;
    }

    public function getStatus2(): ?string
    {
        return $this->status2;
    }

    public function setStatus2(?string $status2): self
    {
        $this->status2 = $status2;

        return $this;
    }


}
