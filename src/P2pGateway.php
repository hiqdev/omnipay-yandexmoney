<?php
/**
 * Yandex.Money driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-yandexmoney
 * @package   omnipay-yandexmoney
 * @license   MIT
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

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
        return [
            'account' => '',
            'password' => '',
        ];
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
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }
}
