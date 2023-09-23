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

namespace App\Http\ValidationRules\Company;

use App\Libraries\MultiDB;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class ValidCompanyQuantity.
 */
class ValidSubdomain implements Rule
{

    public function __construct()
    {
    }

    public function passes($attribute, $value)
    {
        if (empty($value)) {
            return true;
        }

        return MultiDB::checkDomainAvailable($value);
    }

    /**
     * @return string
     */
    public function message()
    {
        return ctrans('texts.subdomain_taken');
    }
}
