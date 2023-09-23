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

namespace App\DataMapper;

class PaymentTransaction
{
    public $transaction_id;

    public $gateway_response;

    public $account_gateway_id;

    public $type_id;

    public $status; // prepayment|payment|response|completed

    public $invoices;
}
