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

use Omnipay\Common\PaymentMethod;
use Omnipay\Tests\TestCase;
use Omnipay\YandexMoney\Message\p2p\PurchaseRequest;
use Omnipay\YandexMoney\Tests\Stubs\PurchaseRequestStub;

class PurchaseRequestTest extends TestCase
{
    /**
     * @var PurchaseRequestStub
     */
    private $stub;

    /**
     * @var PurchaseRequest
     */
    protected $request;

    public function setUp()
    {
        parent::setUp();

        $this->stub = new PurchaseRequestStub();
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

    public function testGetData()
    {
        $data = $this->request->getData();

        $this->assertSame($this->stub->account, $data['receiver']);
        $this->assertSame($this->stub->description, $data['formcomment']);
        $this->assertSame($this->stub->description, $data['short-dest']);
        $this->assertSame('false', $data['writable-targets']);
        $this->assertSame('true', $data['comment-needed']);
        $this->assertSame($this->stub->transactionId, $data['label']);
        $this->assertSame('shop', $data['quickpay-form']);
        $this->assertSame('Order ' . $this->stub->transactionId, $data['targets']);
        $this->assertSame($this->stub->amount, $data['sum']);
        $this->assertSame($this->stub->comment, $data['comment']);
        $this->assertSame('yes', $data['need-fio']);
        $this->assertSame('yes', $data['need-email']);
        $this->assertSame('false', $data['need-phone']);
        $this->assertSame('false', $data['need-address']);
        $this->assertSame($this->stub->paymentMethod, $data['paymentType']);
        $this->assertSame($this->stub->returnUrl, $data['successURL']);
        $this->assertSame($this->stub->cancelUrl, $data['failURL']);
    }

    public function testSendData()
    {
        $data = $this->request->getData();
        $response = $this->request->sendData($data);
        $this->assertSame('Omnipay\YandexMoney\Message\p2p\PurchaseResponse', get_class($response));
    }
}
