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

namespace App\PaymentDrivers\Stripe\Connect;

class Account
{
    /**
     * @throws \Stripe\Exception\ApiErrorException
     */
    public static function create(array $payload): \Stripe\Account
    {
        $stripe = new \Stripe\StripeClient(
            config('ninja.ninja_stripe_key')
        );

        return $stripe->accounts->create([
            'type' => 'standard',
            'country' => $payload['country'],
            'email' => $payload['email'],
        ]);
    }

    /**
     * @throws \Stripe\Exception\ApiErrorException
     */
    public static function link(string $account_id, string $token): \Stripe\AccountLink
    {
        $stripe = new \Stripe\StripeClient(
            config('ninja.ninja_stripe_key')
        );

        return $stripe->accountLinks->create([
            'account' => $account_id,
            'refresh_url' => route('stripe_connect.initialization', $token),
            'return_url' => route('stripe_connect.return'),
            'type' => 'account_onboarding',
        ]);
    }
}
