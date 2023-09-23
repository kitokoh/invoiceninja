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

namespace App\Events\PurchaseOrder;

use App\Models\Company;
use App\Models\PurchaseOrder;
use Illuminate\Queue\SerializesModels;

/**
 * Class PurchaseOrderWasRestored.
 */
class PurchaseOrderWasRestored
{
    use SerializesModels;

    public function __construct(public PurchaseOrder $purchase_order, public bool $fromDeleted, public Company $company, public array $event_vars)
    {
    }
}
