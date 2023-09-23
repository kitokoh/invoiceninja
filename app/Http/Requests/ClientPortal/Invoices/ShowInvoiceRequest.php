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

namespace App\Http\Requests\ClientPortal\Invoices;

use App\Http\Requests\Request;
use App\Http\ViewComposers\PortalComposer;

class ShowInvoiceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return (int) auth()->guard('contact')->user()->client_id === (int) $this->invoice->client_id
            && auth()->guard('contact')->user()->company->enabled_modules & PortalComposer::MODULE_INVOICES;
    }
}
