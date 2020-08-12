<?php
/**
 * Yandex.Money driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-yandexmoney
 * @package   omnipay-yandexmoney
 * @license   MIT
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\YandexMoney\Message\p2p;

use Yii;

/**
 * YandexMoney Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    public function getComment()
    {
        return $this->getParameter('comment');
    }

    public function setComment($value)
    {
        return $this->setParameter('comment', $value);
    }

    public function getData()
    {
        $this->validate('account', 'description', 'transactionId', 'amount', 'paymentMethod', 'returnUrl', 'cancelUrl');
        foreach (['name', 'email', 'phone', 'address'] as $name) {
            $params[$name] = !isset(Yii::$app->params["php.merchant.yandex.request.sender.{$name}"]) || Yii::$app->params["php.merchant.yandex.request.sender.{$name}"] === true;
        }

        $data = [];
        $data['receiver'] = $this->getAccount();
        $data['formcomment'] = $this->getDescription();
        $data['short-dest'] = $this->getDescription();
        $data['writable-targets'] = 'false';
        $data['comment-needed'] = 'true';
        $data['label'] = $this->getTransactionId();
        $data['quickpay-form'] = 'shop';
        $data['targets'] = 'Order ' . $this->getTransactionId();
        $data['sum'] = $this->getAmount();
        $data['comment'] = $this->getComment();
        $data['need-fio'] = $params['name']  ? 'yes' : 'false';
        $data['need-email'] = $params['email'] ?  'yes' : 'false';
        $data['need-phone'] = $params['phone'] ? 'yes' : 'false';
        $data['need-address'] = $params['address'] ? 'yes' : 'false';

        $data['paymentType'] = $this->getPaymentMethod();

        $data['successURL'] = $this->getReturnUrl();
        $data['failURL'] = $this->getCancelUrl();

        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}
