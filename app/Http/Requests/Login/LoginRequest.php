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

namespace App\Http\Requests\Login;

use App\Http\Requests\Request;
use App\Http\ValidationRules\Account\BlackListRule;
use App\Http\ValidationRules\Account\EmailBlackListRule;
use App\Utils\Ninja;

class LoginRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Ninja::isHosted()) {
            $email_rules = ['required', new BlackListRule, new EmailBlackListRule];
        } else {
            $email_rules = 'required';
        }

        return [
            'email' => $email_rules,
            'password' => 'required|max:1000',
        ];
    }
}
