<?php

namespace Omnipay\Tests;

use Symfony\Component\HttpFoundation\Request as HttpRequest;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function getHttpClient(): \Omnipay\Common\Http\Client
    {
        return new \Omnipay\Common\Http\Client();
    }

    protected function getHttpRequest(): HttpRequest
    {
        return HttpRequest::createFromGlobals();
    }
}

class GatewayTestCase extends TestCase
{
}
