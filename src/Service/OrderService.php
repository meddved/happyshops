<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\TOrders;
use App\Exception\EntityNotFoundException;
use App\Repository\TOrdersRepository;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;

class OrderService
{
    private EntityManagerInterface $entityManager;
    private SerializerInterface $serializer;
    private PaginatorInterface $paginator;

    /**
     * OrderService constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param SerializerInterface $serializer
     * @param PaginatorInterface $paginator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer,
        PaginatorInterface $paginator) {

        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
        $this->paginator = $paginator;
    }

    /**
     * @param int $page
     * @param int $limit
     * @param array $filter
     *
     * @return Response
     */
    public function getOrders(int $page = 1, int $limit = 1000, array $filter = []) : Response
    {
        $queryBuilder = $this->getOrderRepository()->createFindAllQuery();

        if (!empty($filter)) {
            $queryBuilder = $this->getOrderRepository()->createFindFilteredQuery($filter);
        }
        if ($page) {
            $orders = $this->paginator->paginate(
                $queryBuilder->getQuery(),
                $page,
                $limit
            );
        }


        if (empty($orders)) {
            throw new EntityNotFoundException('No orders found', Response::HTTP_NOT_FOUND);
        }

        $ordersJson = $this->serializer->serialize($orders, 'json');

        return new Response($ordersJson, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function getOrder(int $id) : Response
    {
        $order = $this->entityManager->getRepository(TOrders::class)->find($id);

        if (empty($order)) {
            throw new EntityNotFoundException('Order not found', Response::HTTP_NOT_FOUND);
        }

        $orderJson = $this->serializer->serialize($order, 'json');

        return new Response($orderJson, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    /**
     * @return TOrdersRepository
     */
    private function getOrderRepository() : TOrdersRepository
    {
        return $this->entityManager->getRepository(TOrders::class);
    }
}