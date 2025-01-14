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

namespace App\Http\Requests\Report;

use App\Http\Requests\Request;

class ProfitLossRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return auth()->user()->isAdmin();
    }

    public function rules()
    {
        return [
            'start_date' => 'bail|nullable|required_if:date_range,custom|string|date',
            'end_date' => 'bail|nullable|required_if:date_range,custom|string|date',
            'is_income_billed' => 'required|bail|bool',
            'is_expense_billed' => 'bool',
            'include_tax' => 'required|bail|bool',
            'date_range' => 'sometimes|string',
            'send_email' => 'bool',
        ];
    }

    public function prepareForValidation()
    {
        $input = $this->all();

        if (! array_key_exists('date_range', $input) || $input['date_range'] == '') {
            $input['date_range'] = 'all';
        }

        $this->replace($input);
    }
}
