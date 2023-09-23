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

namespace App\Http\Requests\Webhook;

use App\Http\Requests\Request;

class RetryWebhookRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    public function rules()
    {
        return [
            'entity' => 'required|bail|in:client,credit,invoice,product,task,payment,quote,purchase_order,expense,project,vendor',
            'entity_id' => 'required|bail|string',
        ];
    }
}
