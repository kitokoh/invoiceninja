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

namespace App\Http\Requests\Payment;

use App\Http\Requests\Request;

class EditPaymentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('edit', $this->payment);
    }

    public function rules()
    {
        $rules = [];

        return $rules;
    }

    public function prepareForValidation()
    {
        $input = $this->all();

        //$input['id'] = $this->encodePrimaryKey($input['id']);

        $this->replace($input);
    }
}
