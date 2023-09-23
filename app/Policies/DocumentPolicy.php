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
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy extends EntityPolicy
{
    use HandlesAuthorization;

    public function create(User $user) : bool
    {
        return $user->isAdmin() || $user->hasPermission('create_all');
    }
}
