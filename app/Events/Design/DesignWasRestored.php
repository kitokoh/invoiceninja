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

namespace App\Events\Design;

use App\Models\Design;
use App\Models\Company;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;

/**
 * Class DesignWasRestored.
 */
class DesignWasRestored
{
    use SerializesModels;

    public function __construct(public Design $design, public bool $fromDeleted, public Company $company, public array $event_vars)
    {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel|array
     */
     public function broadcastOn()
     {
        return [];
     }
}
