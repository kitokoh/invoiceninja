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

namespace App\Http\Requests\Setup;

use App\Http\Requests\Request;

class CheckMailRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; /* Return something that will check if setup has been completed, like Ninja::hasCompletedSetup() */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mail_driver' => 'required',
            'encryption' => 'required_unless:mail_driver,log',
            'mail_host' => 'required_unless:mail_driver,log',
            'mail_username' => 'required_unless:mail_driver,log',
            'mail_name' => 'required_unless:mail_driver,log',
            'mail_address' => 'required_unless:mail_driver,log',
            'mail_password' => 'required_unless:mail_driver,log',
        ];
    }
}
