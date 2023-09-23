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

use App\Http\ViewComposers\PortalComposer;
use Illuminate\Foundation\Http\FormRequest;

class ProcessInvoicesInBulkRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard('contact')->user()->company->enabled_modules & PortalComposer::MODULE_INVOICES;
    }

    public function rules()
    {
        return [
            'invoices' => ['array'],
        ];
    }
}
