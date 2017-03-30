<?php
/**
 * Yandex.Money driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-yandexmoney
 * @package   omnipay-yandexmoney
 * @license   MIT
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\YandexMoney\Tests\Message;

use Omnipay\Tests\TestCase;
use Omnipay\YandexMoney\Message\p2p\PurchaseRequest;
use Omnipay\YandexMoney\Message\p2p\PurchaseResponse;
use Omnipay\YandexMoney\Tests\Stubs\PurchaseResponseStub;

class PurchaseResponseTest extends TestCase
{
    /**
     * @var PurchaseRequest
     */
    protected $request;

    /**
     * @var PurchaseResponseStub
     */
    private $stub;

    public function setUp()
    {
        parent::setUp();

        $this->stub = new PurchaseResponseStub();
        $stub = $this->stub;

        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize([
            'account' => $stub->account,
            'password' => $stub->password,
            'returnUrl' => $stub->returnUrl,
            'cancelUrl' => $stub->cancelUrl,
            'description' => $stub->description,
            'transactionId' => $stub->transactionId,
            'amount' => $stub->amount,
            'comment' => $stub->comment,
            'paymentMethod' => $stub->paymentMethod,
        ]);
    }

    public function testSuccess()
    {
        /** @var PurchaseResponse $response */
        $response = $this->request->send();
        $stub = $this->stub;

        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertNull($response->getCode());
        $this->assertNull($response->getMessage());
        $this->assertSame($stub->sci, $response->getRedirectUrl());

        $this->assertSame('POST', $response->getRedirectMethod());
        $this->assertSame([
            'receiver' => '4100324767724',
            'formcomment' => 'Test Transaction long description',
            'short-dest' => 'Test Transaction long description',
            'writable-targets' => 'false',
            'comment-needed' => 'true',
            'label' => 'ID_123456',
            'quickpay-form' => 'shop',
            'targets' => 'Order ID_123456',
            'sum' => '14.65',
            'comment' => 'I need them all!',
            'need-fio' => 'yes',
            'need-email' => 'yes',
            'need-phone' => 'false',
            'need-address' => 'false',
            'paymentType' => 'PC',
            'successURL' => 'https://www.example.com/success',
            'failURL' => 'https://www.example.com/failure',
        ], $response->getRedirectData());
    }
}
