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

namespace App\Http\Requests\Design;

use App\Http\Requests\Request;
use App\Utils\Traits\ChecksEntityStatus;

class UpdateDesignRequest extends Request
{
    use ChecksEntityStatus;

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
        return [];
    }

    public function prepareForValidation()
    {
        $input = $this->all();

        if (! array_key_exists('product', $input['design']) || is_null($input['design']['product'])) {
            $input['design']['product'] = '';
        }

        if (! array_key_exists('task', $input['design']) || is_null($input['design']['task'])) {
            $input['design']['task'] = '';
        }

        if (! array_key_exists('includes', $input['design']) || is_null($input['design']['includes'])) {
            $input['design']['includes'] = '';
        }

        if (! array_key_exists('footer', $input['design']) || is_null($input['design']['footer'])) {
            $input['design']['footer'] = '';
        }

        if (! array_key_exists('header', $input['design']) || is_null($input['design']['header'])) {
            $input['design']['header'] = '';
        }

        if (! array_key_exists('body', $input['design']) || is_null($input['design']['body'])) {
            $input['design']['body'] = '';
        }

        $this->replace($input);
    }
}
