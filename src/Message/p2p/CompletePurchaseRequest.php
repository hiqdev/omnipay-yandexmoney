<?php

namespace Omnipay\YandexMoney\Message\p2p;

/**
 * YandexMoney Authorize Request
 */
class CompletePurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('password');

        return $this->httpRequest->request->all();
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
