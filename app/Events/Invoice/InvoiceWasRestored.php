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

namespace App\Events\Invoice;

use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Queue\SerializesModels;

/**
 * Class InvoiceWasRestored.
 */
class InvoiceWasRestored
{
    use SerializesModels;

    /**
     * @var Invoice
     */
    public $invoice;

    public $fromDeleted;

    public $company;

    public $event_vars;

    /**
     * Create a new event instance.
     *
     * @param Invoice $invoice
     * @param $fromDeleted
     * @param Company $company
     * @param array $event_vars
     */
    public function __construct(Invoice $invoice, $fromDeleted, Company $company, array $event_vars)
    {
        $this->invoice = $invoice;
        $this->fromDeleted = $fromDeleted;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }
}
