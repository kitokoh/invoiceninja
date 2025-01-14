<?php
/**
 * Africa Novatech (https://africanovatech.com)
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2023. Africa Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\Http\Requests\PurchaseOrder;

use App\Http\Requests\Request;

class BulkPurchaseOrderRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize() : bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'ids' => 'required|bail|array|min:1',
            'action' => 'in:archive,restore,delete,email,bulk_download,bulk_print,mark_sent,download,send_email,add_to_inventory,expense,cancel'
        ];
    }
}
