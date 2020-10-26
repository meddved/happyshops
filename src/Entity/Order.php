<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 * @package App\Entity
 *
 * @ORM\Table(name="t_orders")
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 *
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return integer
     */
    public function getId() : int
    {
        return $this->id;
    }

}