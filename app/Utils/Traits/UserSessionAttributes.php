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

namespace App\Utils\Traits;

/**
 * Class UserSessionAttributes.
 */
trait UserSessionAttributes
{
    /**
     * @param $value
     */
    public function setCurrentCompanyId($value) : void
    {
        session(['current_company_id' => $value]);
    }

    /**
     * @return int
     */
    public function getCurrentCompanyId() : int
    {
        return session('current_company_id');
    }
}
