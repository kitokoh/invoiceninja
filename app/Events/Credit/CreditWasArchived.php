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

namespace App\Events\Credit;

use App\Models\Company;
use App\Models\Credit;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreditWasArchived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $credit;

    public $company;

    public $event_vars;

    /**
     * Create a new event instance.
     *
     * @param Credit $credit
     * @param Company $company
     * @param array $event_vars
     */
    public function __construct(Credit $credit, Company $company, array $event_vars)
    {
        $this->credit = $credit;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }
}
