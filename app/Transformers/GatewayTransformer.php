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

namespace App\Transformers;

use App\Models\Gateway;
use App\Utils\Traits\MakesHash;

/**
 * class ClientTransformer.
 */
class GatewayTransformer extends EntityTransformer
{
    use MakesHash;

    protected $defaultIncludes = [
    ];

    /**
     * @var array
     */
    protected $availableIncludes = [
    ];

    /**
     * @param Gateway $gateway
     * @return array
     */
    public function transform(Gateway $gateway)
    {
        return [
            'id' => $this->encodePrimaryKey($gateway->id),
            'name' => (string) $gateway->name ?: '',
            'key' => (string) $gateway->key ?: '',
            'provider' => (string) $gateway->provider ?: '',
            'visible' => (bool) $gateway->visible,
            'sort_order' => (int) $gateway->sort_order,
            'default_gateway_type_id' => (string) $gateway->default_gateway_type_id,
            'site_url' => (string) $gateway->site_url ?: '',
            'is_offsite' => (bool) $gateway->is_offsite,
            'is_secure' => (bool) $gateway->is_secure,
            'fields' => (string) $gateway->fields ?: '',
            'updated_at' => (int) $gateway->updated_at,
            'created_at' => (int) $gateway->created_at,
            'options' => $gateway->getMethods(),
        ];
    }
}
