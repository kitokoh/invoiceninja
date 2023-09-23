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

namespace App\Events\Vendor;

use App\Models\Company;
use App\Models\Vendor;
use Illuminate\Queue\SerializesModels;

/**
 * Class VendorWasArchived.
 */
class VendorWasArchived
{
    // vendor
    use SerializesModels;

    /**
     * @var Vendor
     */
    public $vendor;

    public $company;

    public $event_vars;

    /**
     * Create a new event instance.
     *
     * @param Vendor $vendor
     * @param Company $company
     * @param array $event_vars
     */
    public function __construct(Vendor $vendor, Company $company, array $event_vars)
    {
        $this->vendor = $vendor;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }
}
