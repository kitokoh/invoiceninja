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
use App\Models\InvoiceInvitation;
use Illuminate\Queue\SerializesModels;

/**
 * Class InvoiceReminderWasEmailed.
 */
class InvoiceReminderWasEmailed
{
    use SerializesModels;

    public function __construct(public InvoiceInvitation $invitation, public Company $company, public array $event_vars, public string $template)
    {
    }
}
