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

namespace App\Http\Requests\Document;

use App\Http\Requests\Request;
use App\Models\Document;

class StoreDocumentRequest extends Request
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

        return $user->can('create', Document::class);
    }

    public function rules()
    {
        return [
            'is_public' => 'sometimes|boolean',
        ];
    }

    public function prepareForValidation()
    {
        $input = $this->all();

        if(isset($input['is_public'])) 
            $input['is_public'] = $this->toBoolean($input['is_public']);

        $this->replace($input);
    }

}
