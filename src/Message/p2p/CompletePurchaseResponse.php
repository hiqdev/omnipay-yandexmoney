<?php

namespace Omnipay\YandexMoney\Message\p2p;

use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;


/**
 * YandexMoney Authorize Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * @var CompletePurchaseRequest
     */
    public $request;

    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        if ($this->getUnaccepted() !== 'false') {
            throw new InvalidResponseException('Transaction not done');
        }

        if ($this->getSha1Hash() !== $this->calculateHash()) {
            throw new InvalidResponseException('Invalid hash');
        }
    }

    public function getNotificationType()
    {
        return $this->data['notification_type'];
    }


    public function getNotification_type()
    {
        return $this->data['notification_type'];
    }


    public function getFirstname()
    {
        return $this->data['firstname'];
    }


    public function getFathersname()
    {
        return $this->data['fathersname'];
    }


    public function getLastname()
    {
        return $this->data['lastname'];
    }


    public function getOperationId()
    {
        return $this->data['operation_id'];
    }


    public function getOperation_id()
    {
        return $this->data['operation_id'];
    }


    public function getCurrency()
    {
        return $this->data['currency'];
    }

    public function getDatetime()
    {
        return $this->data['datetime'];
    }


    public function getSender()
    {
        return $this->data['sender'];
    }


    public function getCodepro()
    {
        return $this->data['codepro'];
    }


    public function getLabel()
    {
        return $this->data['label'];
    }


    public function getSha1Hash()
    {
        return $this->data['sha1_hash'];
    }


    public function getSha1_hash()
    {
        return $this->data['sha1_hash'];
    }

    public function getWithdraw_amount()
    {
        return $this->data['withdraw_amount'];
    }


    public function getWithdrawAmount()
    {
        return $this->data['withdraw_amount'];
    }


    public function getUnaccepted()
    {
        return $this->data['unaccepted'];
    }


    public function getCity()
    {
        return $this->data['city'];
    }


    public function getBuilding()
    {
        return $this->data['building'];
    }


    public function getSuite()
    {
        return $this->data['suite'];
    }


    public function getStreet()
    {
        return $this->data['street'];
    }


    public function getFlat()
    {
        return $this->data['flat'];
    }


    public function getEmail()
    {
        return $this->data['email'];
    }


    public function getPhone()
    {
        return $this->data['phone'];
    }


    public function isSuccessful()
    {
        return true;
    }

    public function isRedirect()
    {
        return false;
    }

    public function getMessage()
    {
        if ($this->isSuccessful()) {
            return false;
        } else {
            return 'HTTP/1.0 401 Unauthorized';
        }
    }

    public function getTransactionReference()
    {
        return $this->getOperationId();
    }

    public function calculateHash()
    {
        $string = $this->getNotificationType() . '&'
            . $this->getOperationId() . '&'
            . $this->getAmount() . '&'
            . $this->getCurrency() . '&'
            . $this->getDatetime() . '&'
            . $this->getSender() . '&'
            . $this->getCodepro() . '&'
            . $this->request->getPassword() . '&'
            . $this->getLabel();

        return (sha1($string) == $this->getSha1Hash());
    }

    public function getAmount()
    {
        return $this->data['amount'];
    }
}
