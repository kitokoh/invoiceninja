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

namespace App\Http\Requests\Preview;

use App\Http\Requests\Request;
use App\Models\Credit;
use App\Models\Invoice;
use App\Models\PurchaseOrder;
use App\Models\Quote;
use App\Models\RecurringInvoice;
use App\Utils\Traits\CleanLineItems;
use App\Utils\Traits\MakesHash;

class DesignPreviewRequest extends Request
{
    use MakesHash;
    use CleanLineItems;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return auth()->user()->can('create', Invoice::class) ||
               auth()->user()->can('create', Quote::class) ||
               auth()->user()->can('create', RecurringInvoice::class) ||
               auth()->user()->can('create', Credit::class) ||
               auth()->user()->can('create', PurchaseOrder::class);
    }

    public function rules()
    {
        $rules = [
            'entity_type' => 'bail|required|in:invoice,quote,credit,purchase_order',
            'settings_type' => 'bail|required|in:company,group,client',
            'settings' => 'sometimes',
            'group_id' => 'sometimes',
            'client_id' => 'sometimes',
            'design' => 'bail|sometimes|array'
        ];

        return $rules;
    }

    public function prepareForValidation()
    {
        $input = $this->all();

        $input = $this->decodePrimaryKeys($input);

        $input['line_items'] = isset($input['line_items']) ? $this->cleanItems($input['line_items']) : [];
        $input['amount'] = 0;
        $input['balance'] = 0;
        $input['number'] = ctrans('texts.live_preview').' #'.rand(0, 1000);

        $this->replace($input);
    }
}
