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

use App\Models\Subscription;

class SubscriptionFactory
{
    public static function create(int $company_id, int $user_id): Subscription
    {
        $billing_subscription = new Subscription();
        $billing_subscription->company_id = $company_id;
        $billing_subscription->user_id = $user_id;

        return $billing_subscription;
    }
}
