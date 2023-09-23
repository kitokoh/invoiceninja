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

namespace App\Factory;

use App\Models\Vendor;
use Illuminate\Support\Str;

class VendorFactory
{
    public static function create(int $company_id, int $user_id) :Vendor
    {
        $vendor = new Vendor;
        $vendor->company_id = $company_id;
        $vendor->user_id = $user_id;
        $vendor->name = '';
        $vendor->website = '';
        $vendor->private_notes = '';
        $vendor->public_notes = '';
        $vendor->country_id = 4;
        $vendor->is_deleted = 0;
        $vendor->vendor_hash = Str::random(40);

        return $vendor;
    }
}
