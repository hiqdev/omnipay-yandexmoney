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
use Omnipay\YandexMoney\Message\p2p\CompletePurchaseResponse;
use Omnipay\YandexMoney\Tests\Stubs\CompletePurchaseResponseStub;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class CompletePurchaseResponseTest extends TestCase
{
    /**
     * @var CompletePurchaseResponseStub
     */
    protected $stub;

    public function setUp()
    {
        parent::setUp();

        $this->stub = new CompletePurchaseResponseStub();
    }

    protected $password = 'R0eMjxF3JgCkgSvdydWvyAXv';

    /**
     * @param array $options
     * @return CompletePurchaseRequest
     */
    public function createRequest($options = [])
    {
        $stub = $this->stub;

        $httpRequest = new HttpRequest([], array_merge($stub->getPayload(), $options));

        $request = new CompletePurchaseRequest($this->getHttpClient(), $httpRequest);
        $request->initialize([
            'password' => $this->password,
        ]);

        return $request;
    }

    public function testSignException()
    {
        $this->setExpectedException('Omnipay\Common\Exception\InvalidResponseException', 'Failed to validate signature');
        $this->createRequest([
            'sha1_hash' => ':)',
        ])->send();
    }

    public function testStateException()
    {
        $this->setExpectedException('Omnipay\Common\Exception\InvalidResponseException', 'The payment was not success');
        $this->createRequest([
            'unaccepted' => 'true',
            'sha1_hash' => '4cc1dc34b6316fc6dfcc265d9732386869a9c49c',
        ])->send();
    }

    public function testSuccess()
    {
        /** @var CompletePurchaseResponse $response */
        $response = $this->createRequest()->send();
        $stub = $this->stub;

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($stub->operation_id, $response->getTransactionReference());
        $this->assertSame($stub->currency, $response->getCurrencyId());
        $this->assertSame('RUB', $response->getCurrency());
        $this->assertSame($stub->amount, $response->getAmount());
        $this->assertSame($stub->label, $response->getTransactionId());
        $this->assertSame($stub->label, $response->getLabel());
        $this->assertSame($stub->operation_label, $response->getOperationLabel());
        $this->assertSame(strtotime($stub->datetime), strtotime($response->getTime()));
        $this->assertSame(strtotime($stub->datetime), strtotime($response->getDatetime()));
    }
}
