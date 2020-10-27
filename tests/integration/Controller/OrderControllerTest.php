<?php


namespace App\Tests\integration\Controller;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderControllerTest extends WebTestCase
{
    private ?Client $client;

    protected function setUp()
    {
        $this->client = new Client();
    }

    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated
        $this->client = null;
    }

    public function testGetOrders()
    {
        try {
            $response = $this->client->get('http://localhost:8000/api/orders', []);
        } catch (GuzzleException $e) {
            //TODO: this exception should be handled
            var_dump($e->getMessage());
            die();
        }

        $this->assertEquals(200, $response->getStatusCode());

        $orders = $response->getBody()->getContents();
        $this->assertCount(5, json_decode($orders));

        //TODO: add more assertions
    }

    public function testGetOrder()
    {
        $response = $this->client->get('http://localhost:8000/api/order/1', []);

        $this->assertEquals(200, $response->getStatusCode());
        $order = json_decode($response->getBody()->getContents());
        $this->assertEquals(1, $order->id);
    }

    public function testGetOrderException()
    {
        $this->expectException(ClientException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Order not found');

        $response = $this->client->get('http://localhost:8000/api/order/0', []);
    }
}