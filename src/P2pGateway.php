<?php

namespace Omnipay\YandexMoney;

use Omnipay\Common\AbstractGateway;
use Omnipay\YandexMoney\Message\p2p\CompletePurchaseRequest;
use Omnipay\YandexMoney\Message\p2p\PurchaseRequest;

class P2pGateway extends AbstractGateway
{
    public function getName()
    {
        return 'YandexMoney';
    }

    public function getDefaultParameters()
    {
        return array(
            'password' => '',
        );
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }
}
