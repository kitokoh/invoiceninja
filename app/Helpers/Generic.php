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

use App\Utils\Ninja;

/**
 * Simple helper function that will log into "invoiceninja.log" file
 * only when extended logging is enabled.
 *
 * @param mixed $output
 * @param array $context
 *
 * @return void
 */
function nlog($output, $context = []): void
{
    if (! config('ninja.expanded_logging')) {
        return;
    }

    if (gettype($output) == 'object') {
        $output = print_r($output, 1);
    }

    // $trace = debug_backtrace();
    
    if (Ninja::isHosted()) {
        try {
            info($output);
        } catch (\Exception $e) {
        }
    } else {
        \Illuminate\Support\Facades\Log::channel('invoiceninja')->info($output, $context);
    }

    $output = null;
    $context = null;
}
