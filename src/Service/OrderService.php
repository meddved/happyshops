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

    /**
     * OrderService constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param SerializerInterface $serializer
     */
    public function __construct(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    /**
     * @return Response
     */
    public function getOrders() : Response
    {
        $orders = $this->entityManager->getRepository(TOrders::class)->findAll();

        if (empty($orders)) {
            throw new HttpException(404, 'No orders found');
        }

        $ordersJson = $this->serializer->serialize($orders, 'json');

        return new Response($ordersJson, 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function getOrder(int $id) : Response
    {
        $order = $this->entityManager->getRepository(TOrders::class)->find($id);

        if (empty($order)) {
            throw new HttpException(404, 'Order not found');
        }

        $orderJson = $this->serializer->serialize($order, 'json');

        return new Response($orderJson, 200, ['Content-Type' => 'application/json']);
    }
}