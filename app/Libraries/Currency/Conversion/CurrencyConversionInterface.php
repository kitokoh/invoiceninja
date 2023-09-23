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

namespace App\Libraries\Currency\Conversion;

interface CurrencyConversionInterface
{
    public function convert($amount, $from_currency_id, $to_currency_id, $date = null);

    public function exchangeRate($from_currency_id, $to_currency_id, $date = null);
}
