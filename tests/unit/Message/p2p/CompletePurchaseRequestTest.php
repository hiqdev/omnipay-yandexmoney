<?php
/**
 * Yandex.Money driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-yandexmoney
 * @package   omnipay-yandexmoney
 * @license   MIT
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\YandexMoney\Tests\Message\p2p;

use Omnipay\Tests\TestCase;
use Omnipay\YandexMoney\Message\p2p\CompletePurchaseRequest;
use Omnipay\YandexMoney\Tests\Stubs\CompletePurchaseRequestStub;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class CompletePurchaseRequestTest extends TestCase
{
    /**
     * @var CompletePurchaseRequest
     */
    protected $request;

    /**
     * @var CompletePurchaseRequestStub
     */
    protected $stub;

    protected $password = 'R0eMjxF3JgCkgSvdydWvyAXv';

    public function setUp()
    {
        parent::setUp();

        $this->stub = new CompletePurchaseRequestStub();
        $stub = $this->stub;

        $httpRequest = new HttpRequest([], $stub->getPayload());

        $this->request = new CompletePurchaseRequest($this->getHttpClient(), $httpRequest);
        $this->request->initialize([
            'password' => $this->password,
        ]);
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        foreach ($this->stub->getPayload() as $prop => $value) {
            $this->assertSame($value, $data[$prop]);
        }
    }

    public function testSendData()
    {
        $data = $this->request->getData();
        $response = $this->request->sendData($data);
        $this->assertSame('Omnipay\YandexMoney\Message\p2p\CompletePurchaseResponse', get_class($response));
    }
}
