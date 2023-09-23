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

namespace App\Events\Product;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductWasRestored.
 */
class ProductWasRestored
{
    use SerializesModels;

    public function __construct(public Product $product, public bool $fromDeleted, public Company $company, public array $event_vars)
    {
    }
}
