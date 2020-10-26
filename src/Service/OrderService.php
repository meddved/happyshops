<?php


namespace App\Service;

use App\Entity\TOrders;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderService
{
    private EntityManagerInterface $entityManager;
    private SerializerInterface $serializer;

    public function __construct(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    public function getOrders() : Response
    {
        $orders = $this->entityManager->getRepository(TOrders::class)->findAll();

        if (empty($orders)) {
            throw new HttpException(400, 'Invalid data');
        }

        $ordersJson = $this->serializer->serialize($orders, 'json');

        return new Response($ordersJson, 200, ['Content-Type' => 'application/json']);
    }

}