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

    public function getPurse()
    {
        return $this->getAccount();
    }

    public function setPurse($value)
    {
        return $this->setAccount($value);
    }

    public function getPassword()
    {
        return $this->getSecretKey();
    }

    public function setPassword($value)
    {
        return $this->setSecretKey($value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('password');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getMethod()
    {
        return $this->getPaymentMethod();
    }

    public function setMethod($value)
    {
        return $this->setPaymentMethod($value);
    }
}
