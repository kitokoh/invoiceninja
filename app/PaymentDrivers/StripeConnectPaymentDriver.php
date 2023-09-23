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

namespace App\PaymentDrivers;

use App\Models\Client;
use App\Models\CompanyGateway;

class StripeConnectPaymentDriver extends StripePaymentDriver
{
    public function __construct(CompanyGateway $company_gateway, Client $client = null, $invitation = false)
    {
        parent::__construct($company_gateway, $client, $invitation);

        $this->stripe_connect = true;
    }
}
