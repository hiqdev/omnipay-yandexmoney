<?php

/*
 * Yandex.Money driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-yandexmoney
 * @package   omnipay-yandexmoney
 * @license   MIT
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\merchant\yandexmoney;

class Merchant extends \hiqdev\php\merchant\Merchant
{
    protected static $_defaults = [
        'system'    => 'yandexmoney',
        'label'     => 'Yandex.Money',
        'actionUrl' => 'https://money.yandex.ru/quickpay/confirm.xml',
    ];

    public function getInputs()
    {
        return [
            'receiver'         => $this->purse,
            'label'            => $this->username,
            'FormComment'      => 'Оплата товара/услуги',
            'short-dest'       => 'Оплата товара/услуги',
            'writable-targets' => 'false',
            'writable-sum'     => 'false',
            'comment-needed'   => 'false',
            'quickpay-form'    => 'shop',
            'fio'              => '1',
            'mail'             => '1',
            'targets'          => $this->username . '_' . $this->total,
            'sum'              => $this->total,
        ];
    }

    public function validateConfirmation($data)
    {
        if ($data['test_notification']) {
            return 'Test request';
        }
        $hash = implode('&', [
            $data['notification_type'], $data['operation_id'], $data['amount'], $data['currency'],
            $data['datetime'], $data['sender'], $data['codepro'], $this->_secret, $data['label'],
        ]);
        if (hash('sha1', $hash) !== $data['sha1_hash']) {
            return 'Wrong hash';
        }
        $this->mset([
            'from' => $data['sender'],
            'sum'  => $data['amount'],
            'txn'  => $data['operation_id'],
            'time' => $data['datetime'],
        ]);

        return;
    }
}
