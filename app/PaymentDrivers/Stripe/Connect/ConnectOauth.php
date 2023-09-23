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

use Stripe\Stripe;

class ConnectOauth
{
    /**
     * Response payload
     *   "token_type": "bearer",
         "stripe_publishable_key": "{PUBLISHABLE_KEY}",
         "scope": "read_write",
         "livemode": false,
          "stripe_user_id": "{ACCOUNT_ID}",
         "refresh_token": "{REFRESH_TOKEN}",
         "access_token": "{ACCESS_TOKEN}"
     */
    public function getAccountId($code)
    {
        Stripe::setApiKey(config('ninja.ninja_stripe_key'));

        $response = \Stripe\OAuth::token([
            'grant_type' => 'authorization_code',
            'code' => $code,
        ]);

        // Access the connected account id in the response
        $connected_account_id = $response->stripe_user_id;

        return $response;
        //return $connected_account_id;
    }

    /**
     * Revokes access to Stripe from Africa Novatech
     * for the given account id
     */
    public function revoke($account_id)
    {
        Stripe::setApiKey(config('ninja.ninja_stripe_key'));

        \Stripe\OAuth::deauthorize([
            'client_id' => config('ninja.ninja_stripe_key'),
            'stripe_user_id' => $account_id,
        ]);
    }
}
