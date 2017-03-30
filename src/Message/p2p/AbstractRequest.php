<?php

namespace Omnipay\YandexMoney\Message\p2p;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    public function getAccount()
    {
        return $this->getParameter('account');
    }

    public function setAccount($value)
    {
        return $this->setParameter('account', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getMethod()
    {
        return $this->getParameter('method');
    }

    public function setMethod($value)
    {
        return $this->setParameter('method', $value);
    }
}
