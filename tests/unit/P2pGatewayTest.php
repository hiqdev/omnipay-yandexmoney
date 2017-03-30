<?php
/**
 * InterKassa driver for the Omnipay PHP payment processing library
 *
 * @link      https://github.com/hiqdev/omnipay-interkassa
 * @package   omnipay-interkassa
 * @license   MIT
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\YandexMoney\Tests;

use Omnipay\YandexMoney\P2pGateway;
use Omnipay\Tests\GatewayTestCase;

class P2pGatewayTest extends GatewayTestCase
{
    /**
     * @var P2pGateway
     */
    public $gateway;

    protected $account = '4100324767724';
    protected $password = 'R0eMjxF3JgCkgSvdydWvyAXv';
    protected $transactionId = 'ID_123456';
    protected $description = 'Test completePurchase description';
    protected $amount = '29.03';

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new P2pGateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setAccount($this->account);
        $this->gateway->setPassword($this->password);
    }

    public function testGateway()
    {
        $this->assertSame($this->account, $this->gateway->getAccount());
        $this->assertSame($this->password, $this->gateway->getPassword());

        $this->assertSame($this->account, $this->gateway->getPurse());
        $this->assertSame($this->password, $this->gateway->getSignKey());
    }

    public function testCompletePurchase()
    {
        $request = $this->gateway->completePurchase([
            'transactionId' => $this->transactionId,
        ]);

        $this->assertSame($this->account, $request->getAccount());
        $this->assertSame($this->password, $request->getPassword());
        $this->assertSame($this->transactionId, $request->getTransactionId());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase([
            'transactionId' => $this->transactionId,
            'description' => $this->description,
            'amount' => $this->amount,
        ]);

        $this->assertSame($this->transactionId, $request->getTransactionId());
        $this->assertSame($this->description, $request->getDescription());
        $this->assertSame($this->amount, $request->getAmount());
    }
}
