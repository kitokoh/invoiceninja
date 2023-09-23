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

use App\Models\Webhook;

class WebhookFactory
{
    public static function create(int $company_id, int $user_id) :Webhook
    {
        $webhook = new Webhook;
        $webhook->company_id = $company_id;
        $webhook->user_id = $user_id;
        $webhook->target_url = '';
        $webhook->event_id = 1;
        $webhook->format = 'JSON';
        $webhook->rest_method = 'post';
        $webhook->headers = [];

        return $webhook;
    }
}
