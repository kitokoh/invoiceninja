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

namespace App\Events\Quote;

use App\Models\ClientContact;
use App\Models\Company;
use App\Models\Quote;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QuoteWasApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contact;

    public $quote;

    public $company;

    public $event_vars;

    /**
     * Create a new event instance.
     *
     * @param ClientContact $contact
     * @param Quote $quote
     * @param Company $company
     * @param array $event_vars
     */
    public function __construct(ClientContact $contact, Quote $quote, Company $company, array $event_vars)
    {
        $this->contact = $contact;
        $this->quote = $quote;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }
}
