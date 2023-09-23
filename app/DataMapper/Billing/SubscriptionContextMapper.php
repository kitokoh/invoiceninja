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

namespace App\DataMapper\Billing;

class SubscriptionContextMapper
{
    /**
     * @var int
     */
    public $subscription_id;

    /**
     * @var string
     */
    public $email;

    /**
     * @var int
     */
    public $client_id;

    /**
     * @var int
     */
    public $invoice_id;

    /**
     * @var string[]
     */
    public $casts = [
        'subscription_id' => 'integer',
        'email' => 'string',
        'client_id' => 'integer',
        'invoice_id' => 'integer',
    ];
}
