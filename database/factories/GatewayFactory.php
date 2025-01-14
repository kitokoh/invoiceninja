<?php
/**
 * Africa Novatech (https://africanovatech.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2021. Africa Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GatewayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => '3b6621f970ab18887c4f6dca78d3f8bb',
            'visible' => true,
            'sort_order' =>1,
            'name' => 'demo',
            'provider' =>  'test',
            'is_offsite' => true,
            'is_secure' => true,
            'fields' => '',
            'default_gateway_type_id' => 1,
        ];
    }
}
