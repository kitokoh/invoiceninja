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

namespace App\Http\Requests\Expense;

use App\Http\Requests\Request;

class EditExpenseRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return auth()->user()->can('edit', $this->expense);
    }

    // public function prepareForValidation()
    // {
    //     $input = $this->all();

    //     //$input['id'] = $this->encodePrimaryKey($input['id']);

    //     $this->replace($input);

    // }
}
