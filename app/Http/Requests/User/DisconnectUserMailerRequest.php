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

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class DisconnectUserMailerRequest extends Request
{
    private bool $phone_has_changed = false;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {   
        return auth()->user()->id == $this->user->id || auth()->user()->isAdmin();
    }

    public function rules()
    {

        $rules = [
        ];

        return $rules;
    }

    public function prepareForValidation()
    {

    }
}
