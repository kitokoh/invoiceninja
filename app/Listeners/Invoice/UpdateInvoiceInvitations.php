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

namespace App\Listeners\Invoice;

use App\Libraries\MultiDB;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateInvoiceInvitations implements ShouldQueue
{
    public $delay = 5;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        MultiDB::setDb($event->company->db);

        $payment = $event->payment;
        $invoices = $payment->invoices;

        /*
        * Move this into an event
        */
        $invoices->each(function ($invoice) use ($payment) {
            $invoice->invitations()->update(['transaction_reference' => $payment->transaction_reference]);
        });
    }
}
