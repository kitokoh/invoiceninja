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

namespace App\Services\Quote;

use App\Events\Quote\QuoteWasMarkedApproved;
use App\Models\Quote;
use App\Utils\Ninja;

class MarkApproved
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function run($quote)
    {
        /* Return immediately if status is not draft */
        if ($quote->status_id != Quote::STATUS_SENT) {
            return $quote;
        }

        $quote->service()->setStatus(Quote::STATUS_APPROVED)->applyNumber()->save();

        event(new QuoteWasMarkedApproved($quote, $quote->company, Ninja::eventVars()));

        return $quote;
    }
}
