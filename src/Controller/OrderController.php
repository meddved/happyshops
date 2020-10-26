<?php


namespace App\Controller;


use App\Service\OrderService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class OrderController
 * @package App\Controller
 *
 * @Route("/api")
 */
class OrderController extends AbstractFOSRestController
{

    /**
     * @param OrderService $orderService
     * @return Response
     *
     * @Route("/orders", name="get_orders", methods={"GET"})
     */
    public function getOrdersAction(OrderService $orderService) : Response
    {
        return $orderService->getOrders();

//        return $this->container->get('')
//        $em = $this->getDoctrine()->getManager();
//        $orders = $em->getRepository(Order::class)->findAll();
//
//        if (!$orders) {
//            throw new HttpException(400, 'Invalid data');
//        }
//
//        return $orders;
    }
}