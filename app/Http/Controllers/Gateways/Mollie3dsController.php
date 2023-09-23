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
use App\Http\Requests\Gateways\Mollie\Mollie3dsRequest;

class Mollie3dsController extends Controller
{
    public function index(Mollie3dsRequest $request)
    {
        return $request->getCompanyGateway()
            ->driver($request->getClient())
            ->process3dsConfirmation($request);
    }
}
