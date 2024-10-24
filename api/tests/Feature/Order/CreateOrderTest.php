<?php

namespace Tests\Feature\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    protected const ENDPOINT = '/api/orders';

    public static function paramProvider()
    {
        return [
            [
                [],
                'Missing required parameter id, Missing required parameter name, Missing required parameter address, Missing required parameter price, Missing required parameter currency',
            ],
            [
                [
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'fake_data' => 'fake value',
                    ],
                    'price' => '1000',
                    'currency' => 'TWD',
                ],
                'Missing required parameter address.city, Missing required parameter address.district, Missing required parameter address.street'
            ],
            [
                [
                    'id' => true,
                    'name' => false,
                    'address' => 'taipei-city da-an-district fuxing-south-road',
                    'price' => 'Price',
                    'currency' => false,
                ],
                'Parameter id must be string, Parameter name must be string, Parameter address must be array, Missing required parameter address.city, Missing required parameter address.district, Missing required parameter address.street, Parameter price must be numeric, Parameter currency must be string',
            ],
            [
                [
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => ['Taiwan', 'Taipei city'],
                        'district' => ['Da an'],
                        'street' => ['Fuxing south road'],
                    ],
                    'price' => '1000',
                    'currency' => 'TWD',
                ],
                'Parameter address.city must be string, Parameter address.district must be string, Parameter address.street must be string',
            ],
        ];
    }

    #[DataProvider('paramProvider')]
    public function testParamError(array $params, string $expect_message): void
    {
        $response = $this->withHeaders(
            $this->getHeaders(),
        )->post(self::ENDPOINT, $params);

        $response->assertStatus(400)
            ->assertExactJson([
                'status' => 'error',
                'message' => 'Create an order failed. ' . $expect_message,
                'data' => [],
            ]);
    }

    public function testDuplicatedOrderId(): void
    {
        // TODO
    }

    public function testErrorOfInsert(): void
    {
        // TODO
    }

    public function testSuccess(): void
    {
        // TODO
    }
}
