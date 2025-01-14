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

namespace App\Http\Requests\GroupSetting;

use App\DataMapper\ClientSettings;
use App\Http\Requests\Request;
use App\Http\ValidationRules\ValidClientGroupSettingsRule;
use App\Models\Account;
use App\Models\GroupSetting;

class StoreGroupSettingRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return auth()->user()->can('create', GroupSetting::class) && auth()->user()->account->hasFeature(Account::FEATURE_API);
    }

    public function rules()
    {
        $rules['name'] = 'required|unique:group_settings,name,null,null,company_id,'.auth()->user()->companyId();

        $rules['settings'] = new ValidClientGroupSettingsRule();

        return $rules;
    }

    public function prepareForValidation()
    {
        $input = $this->all();

        $group_settings = ClientSettings::defaults();

        if (array_key_exists('settings', $input) && ! empty($input['settings'])) {
            foreach ($input['settings'] as $key => $value) {
                $group_settings->{$key} = $value;
            }
        }

        $input['settings'] = (array)$group_settings;

        $this->replace($input);
    }

    public function messages()
    {
        return [
            'settings' => 'settings must be a valid json structure',
        ];
    }
}
