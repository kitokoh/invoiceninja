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

namespace App\DataMapper\Transactions;

use App\Models\TransactionEvent;

/**
 * PaymentMadeTransaction.
 */
class PaymentMadeTransaction extends BaseTransaction implements TransactionInterface
{
    public $event_id = TransactionEvent::PAYMENT_MADE;
}
