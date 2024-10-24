<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Get headers for request
     *
     * @return array
     */
    protected function getHeaders(): array
    {
        return [
            'Accept' => 'application/json',
        ];
    }
}
