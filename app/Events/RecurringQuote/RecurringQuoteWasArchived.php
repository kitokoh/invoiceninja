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

namespace App\Events\RecurringQuote;

use App\Models\Company;
use App\Models\RecurringQuote;
use Illuminate\Queue\SerializesModels;

/**
 * Class RecurringQuoteWasArchived.
 */
class RecurringQuoteWasArchived
{
    use SerializesModels;

    /**
     * @var RecurringQuote
     */
    public $recurring_quote;

    public $company;

    public $event_vars;

    /**
     * Create a new event instance.
     *
     * @param RecurringQuote $recurring_quote
     * @param Company $company
     * @param array $event_vars
     */
    public function __construct(RecurringQuote $recurring_quote, Company $company, array $event_vars)
    {
        $this->recurring_quote = $recurring_quote;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }
}
