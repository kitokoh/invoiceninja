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

use App\Models\Invoice;

class CloneInvoiceFactory
{
    public static function create($invoice, $user_id)
    {
        $clone_invoice = $invoice->replicate();
        $clone_invoice->status_id = Invoice::STATUS_DRAFT;
        $clone_invoice->number = null;
        $clone_invoice->date = null;
        $clone_invoice->due_date = null;
        $clone_invoice->partial_due_date = null;
        $clone_invoice->user_id = $user_id;
        //$clone_invoice->balance = $invoice->amount;
        $clone_invoice->amount = $invoice->amount;
        $clone_invoice->line_items = $invoice->line_items;

        return $clone_invoice;
    }
}
