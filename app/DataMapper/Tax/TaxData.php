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

namespace App\DataMapper\Tax;

use App\DataMapper\Tax\ZipTax\Response;

/**
 * InvoiceTaxData
 * 
 * Definition for the invoice tax data structure
 */
class TaxData
{
    public int $updated_at;
    
    public function __construct(public Response $origin)
    {
        foreach($origin as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
