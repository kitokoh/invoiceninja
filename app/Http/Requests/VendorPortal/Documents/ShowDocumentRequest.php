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

namespace App\Http\Requests\VendorPortal\Documents;

use App\Utils\Traits\MakesHash;
use Illuminate\Foundation\Http\FormRequest;

class ShowDocumentRequest extends FormRequest
{
    use MakesHash;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
        /** @var \App\Models\VendorContact auth()->guard('vendor')->user() */
        return auth()->guard('vendor')->user()->vendor_id == $this->document->documentable_id
            || $this->document->company_id == auth()->guard('vendor')->user()->company_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
