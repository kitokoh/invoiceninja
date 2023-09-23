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

namespace App\Repositories;

use App\Models\RecurringInvoice;
use App\Models\RecurringInvoiceInvitation;

/**
 * RecurringInvoiceRepository.
 */
class RecurringInvoiceRepository extends BaseRepository
{
    public function save($data, RecurringInvoice $invoice) : ?RecurringInvoice
    {
        $invoice = $this->alternativeSave($data, $invoice);

        return $invoice;
    }

    public function getInvitationByKey($key) :?RecurringInvoiceInvitation
    {
        return RecurringInvoiceInvitation::withTrashed()->where('key', $key)->first();
    }
}
