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

namespace App\Http\Livewire;

use App\Libraries\MultiDB;
use App\Models\RecurringInvoice;
use Livewire\Component;

class RecurringInvoiceCancellation extends Component
{
    /**
     * @var RecurringInvoice
     */
    public $invoice;

    public $company;

    public function mount()
    {
        MultiDB::setDb($this->company->db);
    }

    public function render()
    {
        return render('components.livewire.recurring-invoice-cancellation');
    }

    public function processCancellation()
    {
        if ($this->invoice->subscription) {
            return $this->invoice->subscription->service()->handleCancellation($this->invoice);
        }

        return redirect()->route('client.recurring_invoices.request_cancellation', ['recurring_invoice' => $this->invoice->hashed_id]);
    }
}
