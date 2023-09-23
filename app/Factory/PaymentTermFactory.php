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

namespace App\Factory;

use App\Models\PaymentTerm;

class PaymentTermFactory
{
    public static function create(int $company_id, int $user_id) :PaymentTerm
    {
        $payment_term = new PaymentTerm;
        $payment_term->user_id = $user_id;
        $payment_term->company_id = $company_id;

        return $payment_term;
    }
}
