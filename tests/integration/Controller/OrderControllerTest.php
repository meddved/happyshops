<?php


namespace App\Tests\integration\Controller;


use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderControllerTest extends WebTestCase
{
    private Client $client;

    protected function setUp()
    {
        $mock = new MockHandler([new Response(200, [])]);
        $handler = HandlerStack::create($mock);
        $this->client = new Client(['handler' => $handler]);
    }

    public function testGetOrders()
    {
        $response = $this->client->get('/api/orders', []);

        $contents = $response->getBody()->getContents();
        var_dump($contents);
        die();
    }
}