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

use App\Jobs\Entity\CreateEntityPdf;
use App\Libraries\MultiDB;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateInvoicePdf implements ShouldQueue
{
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

        if (isset($event->invoice)) {
            $event->invoice->invitations->each(function ($invitation) {
                (new CreateEntityPdf($invitation->load('invoice', 'contact.client.company')))->handle();
            });
        }

        if (isset($event->quote)) {
            $event->quote->invitations->each(function ($invitation) {
                (new CreateEntityPdf($invitation->load('quote', 'contact.client.company')))->handle();
            });
        }

        if (isset($event->credit)) {
            $event->credit->invitations->each(function ($invitation) {
                (new CreateEntityPdf($invitation->load('credit', 'contact.client.company')))->handle();
            });
        }
    }
}
