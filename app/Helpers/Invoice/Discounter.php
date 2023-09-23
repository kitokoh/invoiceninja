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

namespace App\Helpers\Invoice;

/**
 * Class for discount calculations.
 */
trait Discounter
{
    public function discount($amount)
    {
        if ($this->invoice->is_amount_discount == true) {
            return $this->invoice->discount;
        }

        return round($amount * ($this->invoice->discount / 100), 2);
    }
}
