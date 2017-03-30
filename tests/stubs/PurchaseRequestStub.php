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

/**
 * Class PurchaseRequestStub
 *
 * @see https://money.yandex.ru/doc.xml?id=526991
 */
class PurchaseRequestStub
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
}
