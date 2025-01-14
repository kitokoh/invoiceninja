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

namespace App\Http\Requests\Gateways\GoCardless;

use App\Libraries\MultiDB;
use App\Models\Client;
use App\Models\Company;
use App\Models\CompanyGateway;
use App\Models\PaymentHash;
use App\Utils\Traits\MakesHash;
use Illuminate\Foundation\Http\FormRequest;

class IbpRequest extends FormRequest
{
    use MakesHash;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        MultiDB::findAndSetDbByCompanyKey($this->company_key);

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getCompany(): ?Company
    {
        return Company::where('company_key', $this->company_key)->first();
    }

    public function getCompanyGateway(): ?CompanyGateway
    {
        return CompanyGateway::find($this->decodePrimaryKey($this->company_gateway_id));
    }

    public function getPaymentHash(): ?PaymentHash
    {
        return PaymentHash::where('hash', $this->hash)->firstOrFail();
    }

    public function getClient(): ?Client
    {
        return Client::find($this->getPaymentHash()->data->client_id);
    }
}
