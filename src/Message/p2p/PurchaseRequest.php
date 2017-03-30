<?php

namespace Omnipay\YandexMoney\Message\p2p;

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
        $data['need-fio'] = 'yes';
        $data['need-email'] = 'yes';
        $data['need-phone'] = 'false';
        $data['need-address'] = 'false';

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
