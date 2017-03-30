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
            'account' => '',
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

    public function getSignKey()
    {
        return $this->getPassword();
    }

    public function setSignKey($value)
    {
        return $this->setPassword($value);
    }

    public function getPurse()
    {
        return $this->getAccount();
    }

    public function setPurse($value)
    {
        return $this->setAccount($value);
    }

    public function getAccount()
    {
        return $this->getParameter('account');
    }

    public function setAccount($value)
    {
        return $this->setParameter('account', $value);
    }

    /**
     * @param array $parameters
     * @return PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }
}
