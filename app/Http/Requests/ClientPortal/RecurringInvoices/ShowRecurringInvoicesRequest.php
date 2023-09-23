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

namespace App\Http\Requests\ClientPortal\RecurringInvoices;

use App\Http\ViewComposers\PortalComposer;
use Illuminate\Foundation\Http\FormRequest;

class ShowRecurringInvoicesRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard('contact')->user()->company->enabled_modules & PortalComposer::MODULE_RECURRING_INVOICES;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
