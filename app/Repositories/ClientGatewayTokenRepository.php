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

namespace App\Repositories;

use App\Models\ClientGatewayToken;

/**
 * Class for ClientGatewayTokenRepository .
 */
class ClientGatewayTokenRepository extends BaseRepository
{
    public function save(array $data, ClientGatewayToken $client_gateway_token) :ClientGatewayToken
    {
        $client_gateway_token->fill($data);
        $client_gateway_token->save();

        return $client_gateway_token->fresh();
    }
}
