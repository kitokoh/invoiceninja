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

namespace App\Http\Requests\VendorPortal\PurchaseOrders;

use App\Http\ViewComposers\PortalComposer;
use Illuminate\Foundation\Http\FormRequest;

class ProcessPurchaseOrdersInBulkRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard('vendor')->user()->vendor->company->enabled_modules & PortalComposer::MODULE_PURCHASE_ORDERS;
    }

    public function rules()
    {
        return [
            'purchase_orders' => ['array'],
        ];
    }
}
