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

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;
use App\Http\ValidationRules\Account\BlackListRule;
use App\Http\ValidationRules\Account\EmailBlackListRule;
use App\Http\ValidationRules\NewUniqueUserRule;
use App\Utils\Ninja;

class CreateAccountRequest extends Request
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
            $email_rules = ['bail', 'required', 'email:rfc,dns', new NewUniqueUserRule, new BlackListRule, new EmailBlackListRule];
        } else {
            $email_rules = ['bail', 'required', 'email:rfc,dns', new NewUniqueUserRule];
        }

        return [
            'first_name'        => 'string|max:100',
            'last_name'         =>  'string:max:100',
            'password'          => 'required|string|min:6|max:1000',
            'email'             =>  $email_rules,
            'privacy_policy'    => 'required|boolean',
            'terms_of_service'  => 'required|boolean',
        ];
    }

    public function prepareForValidation()
    {
        $input = $this->all();

        $input['user_agent'] = request()->server('HTTP_USER_AGENT');

        $this->replace($input);
    }
}
