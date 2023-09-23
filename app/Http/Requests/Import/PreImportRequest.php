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

namespace App\Http\Requests\Import;

use App\Http\Requests\Request;

class PreImportRequest extends Request
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
            'files.*' => 'file|mimetypes:text/csv,text/plain,application/octet-stream',
            'files' => 'required|array|min:1|max:6',
            'import_type' => 'required',
        ];
    }

}
