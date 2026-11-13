<?php

namespace Omnipay\Tests;

use Symfony\Component\HttpFoundation\Request as HttpRequest;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function getHttpClient(): \Omnipay\Common\Http\Client
    {
        return new \Omnipay\Common\Http\Client(new \Http\Mock\Client());
    }

    protected function getHttpRequest(): HttpRequest
    {
        return new HttpRequest();
    }
}

class GatewayTestCase extends TestCase
{
}
