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

namespace App\Http\Controllers;

use App\Http\Requests\Payments\PaymentWebhookRequest;

class PaymentWebhookController extends Controller
{
    public function __invoke(PaymentWebhookRequest $request)
    {
        //return early if we cannot resolve the company gateway
        if (!$request->getCompanyGateway()) {
            return response()->json([], 200);
        }

        return $request
            ->getCompanyGateway()
            ->driver()
            ->processWebhookRequest($request);
    }
}
