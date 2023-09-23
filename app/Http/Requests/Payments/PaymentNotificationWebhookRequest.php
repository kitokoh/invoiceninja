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

namespace App\Http\Requests\Payments;

use App\Http\Requests\Request;
use App\Libraries\MultiDB;
use App\Utils\Traits\MakesHash;

class PaymentNotificationWebhookRequest extends Request
{
    use MakesHash;

    public function authorize()
    {
        MultiDB::findAndSetDbByCompanyKey($this->company_key);

        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
