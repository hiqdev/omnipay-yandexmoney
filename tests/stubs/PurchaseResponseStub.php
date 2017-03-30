<?php
/**
 * InterKassa driver for the Omnipay PHP payment processing library
 *
 * @link      https://github.com/hiqdev/omnipay-interkassa
 * @package   omnipay-interkassa
 * @license   MIT
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\YandexMoney\Tests\Stubs;

class PurchaseResponseStub
{
    public $account = '4100324767724';
    public $password = 'R0eMjxF3JgCkgSvdydWvyAXv';
    public $returnUrl = 'https://www.example.com/success';
    public $cancelUrl = 'https://www.example.com/failure';
    public $amount = '14.65';
    public $description = 'Test Transaction long description';
    public $transactionId = 'ID_123456';
    public $comment = 'I need them all!';
    public $paymentMethod = 'PC';
    public $sci = 'https://money.yandex.ru/quickpay/confirm.xml';
}
