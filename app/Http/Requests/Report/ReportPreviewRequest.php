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

namespace App\Http\Requests\Report;

use App\Http\Requests\Request;

class ReportPreviewRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        return $user->isAdmin() || $user->hasPermission('view_reports');
        
    }

    public function rules()
    {
        return [
        ];
    }

    public function prepareForValidation()
    {
    }
}
