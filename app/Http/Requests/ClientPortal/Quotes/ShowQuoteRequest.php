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

namespace App\Http\Requests\ClientPortal\Quotes;

use App\Http\ViewComposers\PortalComposer;
use Illuminate\Foundation\Http\FormRequest;

class ShowQuoteRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard('contact')->user()->client->id === (int) $this->quote->client_id
             && auth()->guard('contact')->user()->company->enabled_modules & PortalComposer::MODULE_QUOTES;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
