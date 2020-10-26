<?php


namespace App\Service;

use App\Repository\OrderRepository;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class OrderService
{
    private OrderRepository $orderRepository;
    private SerializerInterface $serializer;

    public function __construct(OrderRepository $orderRepository, SerializerInterface $serializer)
    {
        $this->orderRepository = $orderRepository;
        $this->serializer = $serializer;
    }

    public function getOrders() : Response
    {
        $orders = $this->orderRepository->findAll();

        $ordersJson = $this->serializer->serialize($orders, 'json');

        return new Response($ordersJson);
    }

}