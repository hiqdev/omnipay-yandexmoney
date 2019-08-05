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

        if ($this->getSha1Hash() !== $this->calculateHash()) {
            throw new InvalidResponseException('Failed to validate signature');
        }

        if ($this->getUnaccepted() !== 'false') {
            throw new InvalidResponseException('The payment was not success');
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
        return $this->getOperationId();
    }

    public function getCurrencyId()
    {
        return $this->data['currency'];
    }

    /**
     * @return string Always "RUB".
     * Yandex always returns currency=643 (mapped to currencyId), so currency is always RUB.
     * @see https://tech.yandex.ru/money/doc/dg/reference/notification-p2p-incoming-docpage/
     */
    public function getCurrency()
    {
        return 'RUB';
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

    public function getTransactionId()
    {
        return $this->getLabel();
    }

    public function getSha1Hash()
    {
        return $this->data['sha1_hash'];
    }

    public function getTime()
    {
        return $this->getDatetime();
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

    public function getOperationLabel()
    {
        return $this->data['operation_label'];
    }

    public function getOperation_label()
    {
        return $this->data['operation_label'];
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
        return false;
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
            . $this->getCurrencyId() . '&'
            . $this->getDatetime() . '&'
            . $this->getSender() . '&'
            . $this->getCodepro() . '&'
            . $this->request->getPassword() . '&'
            . $this->getLabel();

        return sha1($string);
    }

    public function getFee()
    {
        return (string)($this->getAmount() - $this->getWithdrawAmount());
    }

    public function getAmount()
    {
        return $this->data['amount'];
    }
}
