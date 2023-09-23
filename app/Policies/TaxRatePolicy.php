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

namespace App\Policies;

use App\Models\User;

/**
 * Class TaxRatePolicy.
 */
class TaxRatePolicy extends EntityPolicy
{
    public function create(User $user) : bool
    {
        return $user->isAdmin();
    }
}
