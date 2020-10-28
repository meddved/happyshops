<?php
declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Entity\TOrders;
use App\Exception\EntityNotFoundException;
use App\Repository\TOrdersRepository;
use App\Service\OrderService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializerBuilder;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{
    private OrderService $orderService;
    /** @var TOrdersRepository|MockObject $ordersRepositoryMock */
    private $orderRepositoryMock;
    /** @var PaginatorInterface|MockObject $paginatorMock */
    private $paginatorMock;

    protected function setUp()
    {
        $this->orderRepositoryMock = $this->getMockBuilder(TOrdersRepository::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        /** @var EntityManagerInterface|MockObject $entityManagerMock */
        $entityManagerMock = $this->getMockBuilder(EntityManager::class)
            ->disableOriginalConstructor()
            ->setMethods(['getRepository'])
            ->getMock();

        $entityManagerMock->expects($this->once())
            ->method('getRepository')
            ->willReturn($this->orderRepositoryMock);

        $serializer = $serializer = SerializerBuilder::create()->build();

        $this->paginatorMock = $this->getMockBuilder(Paginator::class)
            ->disableOriginalConstructor()
            ->setMethods(['paginate'])
            ->getMock();

        $this->orderService = new OrderService($entityManagerMock, $serializer, $this->paginatorMock);
    }


    public function testGetOrder()
    {
        $this->orderRepositoryMock->expects($this->once())
            ->method('find')
            ->willReturn($this->createOrdersStub());

        $response = $this->orderService->getOrder(1);
        $order = json_decode($response->getContent());

        $this->assertTrue($order->active);
        $this->assertEquals(1, $order->host_id);

    }

    public function testGetOrderNotFoundException()
    {
        $this->expectException(EntityNotFoundException::class);
        $this->expectExceptionMessage('Order not found');

        $this->orderService->getOrder(0);
    }

    /**
     * @return TOrders
     */
    private function createOrdersStub() : TOrders
    {
        $order = new TOrders();
        $order->setHostId(1);
        $order->setActive(true);

        return $order;
    }
}