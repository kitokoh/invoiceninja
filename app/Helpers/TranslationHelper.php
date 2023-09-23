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

/**
 * Returns a custom translation string
 * falls back on defaults if no string exists.
 *
 * //Cache::forever($custom_company_translated_string, 'mogly');
 *
 * @param string $string
 * @param array $replace
 * @param null $locale
 * @return string
 */
function ctrans(string $string, $replace = [], $locale = null) : string
{
    return trans($string, $replace, $locale);
}
