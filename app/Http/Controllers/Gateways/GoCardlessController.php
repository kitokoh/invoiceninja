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

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gateways\GoCardless\IbpRequest;
use App\Models\GatewayType;

class GoCardlessController extends Controller
{
    public function ibpRedirect(IbpRequest $request)
    {
        return $request
            ->getCompanyGateway()
            ->driver($request->getClient())
            ->setPaymentMethod(GatewayType::INSTANT_BANK_PAY)
            ->processPaymentResponse($request);
    }
}
