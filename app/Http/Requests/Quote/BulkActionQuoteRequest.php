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

namespace App\Http\Requests\Quote;

use App\Http\Requests\Request;
use App\Http\ValidationRules\Quote\ConvertableQuoteRule;

class BulkActionQuoteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    public function rules()
    {
        $input = $this->all();

        $rules = [];

        if ($input['action'] == 'convert_to_invoice') {
            $rules['action'] = [new ConvertableQuoteRule()];
        }

        return $rules;
    }
}
