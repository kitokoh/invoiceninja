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

namespace App\Events\Payment;

use App\Models\Company;
use App\Models\Payment;
use Illuminate\Queue\SerializesModels;

/**
 * Class PaymentWasRestored.
 */
class PaymentWasRestored
{
    use SerializesModels;

    /**
     * @var Payment
     */
    public $payment;

    public $fromDeleted;

    public $company;

    public $event_vars;

    /**
     * Create a new event instance.
     *
     * @param Payment $payment
     * @param $fromDeleted
     * @param Company $company
     * @param array $event_vars
     */
    public function __construct(Payment $payment, $fromDeleted, Company $company, array $event_vars)
    {
        $this->payment = $payment;
        $this->fromDeleted = $fromDeleted;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }
}
