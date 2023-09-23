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

namespace App\Http\Requests\CompanyUser;

use App\Http\Requests\Request;
use App\Utils\Traits\MakesHash;

class UpdateCompanyUserRequest extends Request
{
    use MakesHash;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return auth()->user()->isAdmin() || (auth()->user()->id == $this->user->id);
    }

    public function rules()
    {
        return [];
    }
}
