<?php

namespace App\Formatters;

class OrderFormatter
{
    /**
     * Format transfered parameters
     *
     * @param array $parameters
     * @return array
     */
    public function formatTransferedParameters(array $parameters): array
    {
        return [
            'id' => strval($parameters['id']),
            'name' => strval($parameters['name']),
            'address' => [
                'city' => strval($parameters['address']['city']),
                'district' => strval($parameters['address']['district']),
                'street' => strval($parameters['address']['street']),
            ],
            'price' => strval($parameters['price']),
            'currency' => strval($parameters['currency']),
        ];
    }
}
