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
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class PaymentWasEmailedAndFailed.
 */
class PaymentWasEmailedAndFailed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Payment
     */
    public $payment;

    public $errors;

    public $company;

    public $event_vars;

    /**
     * PaymentWasEmailedAndFailed constructor.
     * @param Payment $payment
     * @param $company
     * @param string $errors
     * @param array $event_vars
     */
    public function __construct(Payment $payment, Company $company, string $errors, array $event_vars)
    {
        $this->payment = $payment;

        $this->errors = $errors;

        $this->company = $company;

        $this->event_vars = $event_vars;
    }
}
