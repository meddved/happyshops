<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\OrderService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller should be as thin as possible
 * It should actually invoke and call UseCase service class that actually is aware of domain logic
 * Domain logic (Domain services) should not be aware of the code invoking it.
 *
 * Class OrderController
 * @package App\Controller
 *
 * @Route("/api")
 */
class OrderController extends AbstractFOSRestController
{
    /**
     * @param Request $request
     * @param OrderService $orderService
     * @return Response
     *
     * @Route("/orders", name="get_orders", methods={"GET"})
     */
    public function getOrdersAction(Request $request, OrderService $orderService) : Response
    {
        $page = $request->get('page') ? (int) $request->get('page') : 1;
        $limit = $request->get('limit') ? (int) $request->get('limit') : 1000;
        $filter = $request->get('filter') ?? '';
        if ('' !== $filter) {
            $filter = json_decode($filter, true);
        } else {
            $filter = [];
        }

        return $orderService->getOrders($page, $limit, $filter);
    }

    /**
     * @param int $id
     * @param OrderService $orderService
     * @return Response
     *
     * @Route("/order/{id}", name="get_order", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function getOrderAction(int $id, OrderService $orderService) : Response
    {
        return $orderService->getOrder($id);
    }
}