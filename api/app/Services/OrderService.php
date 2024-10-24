<?php

namespace App\Services;

use App\Constants\CurrencyConstant;
use InvalidArgumentException;

class OrderService
{
    /**
     * Validate and transfer param
     *
     * @param array $parameters
     *      @type string $id
     *      @type string $name
     *      @type array $address
     *          @type string $city
     *          @type string $district
     *          @type string $street
     *      @type string $price
     *      @type string $currency
     * @return array
     */
    public function validateAndTransferParameters(array $parameters): array
    {
        $parameters['price'] = floatval($parameters['price']);
        $parameters['currency'] = strtoupper($parameters['currency']);

        try {
            $this->validateParameters(
                $parameters['name'],
                $parameters['price'],
                $parameters['currency'],
            );
        } catch (InvalidArgumentException $e) {
            throw $e;
        }

        if ($parameters['currency'] === CurrencyConstant::CURRENCY_USD) {
            $parameters['price'] *= 31;
            $parameters['currency'] = CurrencyConstant::CURRENCY_TWD;
        }

        return $parameters;
    }

    /**
     * Validate parameters
     *
     * @param string $name
     * @param float $price
     * @param string $currency
     * @return void
     */
    protected function validateParameters(string $name, float $price, string $currency): void
    {
        if (strlen($name) !== mb_strlen($name)) {
            throw new InvalidArgumentException(
                'Name contains non-English characters',
                400,
            );
        }
        $exploded_names = explode(' ', $name);
        foreach ($exploded_names as $exploded_name) {
            if (ord($exploded_name[0]) %65 >= 32) {
                throw new InvalidArgumentException(
                    'Name is not capitalized',
                    400,
                );
            }
        }

        if ($price > 2000) {
            throw new InvalidArgumentException(
                'Price is over 2000',
                400,
            );
        }

        if (!in_array($currency, [
            CurrencyConstant::CURRENCY_TWD,
            CurrencyConstant::CURRENCY_USD,
        ])) {
            throw new InvalidArgumentException(
                'Currency format is wrong',
                400,
            );
        }
    }
}
