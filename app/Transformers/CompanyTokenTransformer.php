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

use App\Models\CompanyToken;
use App\Utils\Traits\MakesHash;

/**
 * Class CompanyTokenTransformer.
 */
class CompanyTokenTransformer extends EntityTransformer
{
    use MakesHash;

    /**
     * @var array
     */
    protected $defaultIncludes = [
    ];

    /**
     * @var array
     */
    protected $availableIncludes = [
    ];

    /**
     * @param CompanyToken $company_token
     *
     * @return array
     */
    public function transform(CompanyToken $company_token)
    {
        return [
            'id' => $this->encodePrimaryKey($company_token->id),
            'user_id' => $this->encodePrimaryKey($company_token->user_id),
            'token' => $company_token->token,
            'name' => $company_token->name ?: '',
            'is_system' =>(bool) $company_token->is_system,
            'updated_at' => (int) $company_token->updated_at,
            'archived_at' => (int) $company_token->deleted_at,
            'created_at' => (int) $company_token->created_at,
            'is_deleted' => (bool) $company_token->is_deleted,
        ];
    }
}
