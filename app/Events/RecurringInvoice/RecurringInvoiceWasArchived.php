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

namespace App\Events\RecurringInvoice;

use App\Models\Company;
use App\Models\RecurringInvoice;
use Illuminate\Queue\SerializesModels;

/**
 * Class RecurringInvoiceWasArchived.
 */
class RecurringInvoiceWasArchived
{
    use SerializesModels;

    public function __construct(public RecurringInvoice $recurring_invoice, public Company $company, public array $event_vars)
    {
    }
}
