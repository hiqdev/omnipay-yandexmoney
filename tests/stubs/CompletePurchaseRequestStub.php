<?php
/**
 * InterKassa driver for the Omnipay PHP payment processing library
 *
 * @link      https://github.com/hiqdev/omnipay-interkassa
 * @package   omnipay-interkassa
 * @license   MIT
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\YandexMoney\Tests\Stubs;

class CompletePurchaseRequestStub
{
    public $notification_type = 'p2p-incoming';
    public $zip = '';
    public $amount = '0.67';
    public $firstname = '';
    public $codepro = 'false';
    public $withdraw_amount = 0.68;
    public $city = '';
    public $unaccepted = 'false';
    public $label = '58dcd46dbfbeb';
    public $building = '';
    public $lastname = '';
    public $datetime = '2017-03-30T09:56:12Z';
    public $suite = '';
    public $sender = 41001823272298;
    public $phone = '';
    public $sha1_hash = '4cc1dc34b6316fc6dfcc265d9732386869a9c49c';
    public $street = '';
    public $flat = '';
    public $fathersname = '';
    public $operation_label = '206ee831-0009-5000-8000-00001f038e0d';
    public $operation_id = '1088365945734010025';
    public $currency = 643;
    public $email = '';

    public function getPayload()
    {
        $result = [];

        $reflection = new \ReflectionObject($this);
        foreach ($reflection->getProperties() as $property) {
            $result[$property->getName()] = $property->getValue($this);
        }

        return $result;
    }
}
