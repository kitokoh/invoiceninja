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

use App\Http\Requests\Request;
use App\Http\ViewComposers\PortalComposer;

class ShowPurchaseOrderRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return (int) auth()->guard('vendor')->user()->vendor_id === (int) $this->purchase_order->vendor_id
            && auth()->guard('vendor')->user()->company->enabled_modules & PortalComposer::MODULE_PURCHASE_ORDERS;
    }
}
