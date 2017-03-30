<?php

namespace Omnipay\YandexMoney\Message\p2p;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * YandexMoney Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        if ($this->getRequest()->getTestMode()) {
            return 'https://demomoney.yandex.ru/quickpay/confirm.xml';
        }

        return 'https://money.yandex.ru/quickpay/confirm.xml';
    }

    public function getRedirectMethod()
    {
        return 'POST';
    }

    public function getRedirectData()
    {
        return $this->data;
    }
}
