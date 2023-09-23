<?php
/**
 * Africa Novatech (https://africanovatech.com).
 *
 * @link https://africanovatech.com source repository
 *
 * @copyright Copyright (c) 2023. Invoice Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\PaymentDrivers\WePay;

use App\PaymentDrivers\WePayPaymentDriver;

class Setup
{
    public $wepay;

    public function __construct(WePayPaymentDriver $wepay)
    {
        $this->wepay = $wepay;
    }

    public function boot($data)
    {
        /*
        'user_id',
        'user_company',
         */

        return render('gateways.wepay.signup.index', $data);
    }
}
