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

        $config = Yii::$app->params;
        $data = [
            'receiver' => $this->getAccount(),
            'formcomment' => $this->getDescription(),
            'short-dest' => $this->getDescription(),
            'writable-targets' => 'false',
            'comment-needed' => 'true',
            'label' => $this->getTransactionId(),
            'quickpay-form' => 'shop',
            'targets' => 'Order ' . $this->getTransactionId(),
            'sum' => $this->getAmount(),
            'comment' => $this->getComment(),
            'paymentType' => $this->getPaymentMethod(),
            'successURL' => $this->getReturnUrl(),
            'failURL' => $this->getCancelUrl(),
        ];

        foreach (['need-fio', 'need-email', 'need-phone', 'need-address'] as $k) {
            $config[self::$preffix . "." . $k] = $config[self::$preffix . "." . $k] ?? true;
            $data[$k] = $config[self::$preffix . "." . $k] === false ? "false" : "yes";
        }

        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}
