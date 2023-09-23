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
use Illuminate\Queue\SerializesModels;

/**
 * Class InvoiceWasEmailedAndFailed.
 */
class InvoiceWasEmailedAndFailed
{
    use SerializesModels;

    public function __construct(public mixed $invitation, public Company $company, public string $message, public string $template, public array $event_vars)
    {
    }
}
