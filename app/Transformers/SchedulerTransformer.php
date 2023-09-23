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

use App\Models\Scheduler;
use App\Utils\Traits\MakesHash;

class SchedulerTransformer extends EntityTransformer
{
    use MakesHash;

    public function transform(Scheduler $scheduler)
    {
        return [
            'id' => $this->encodePrimaryKey($scheduler->id),
            'name' => (string) $scheduler->name,
            'frequency_id' => (string) $scheduler->frequency_id,
            'next_run' => $scheduler->next_run_client->format('Y-m-d'),
            'template' => (string) $scheduler->template,
            'is_paused' => (bool) $scheduler->is_paused,
            'parameters'=> (array) $scheduler->parameters,
            'is_deleted' => (bool) $scheduler->is_deleted,
            'updated_at' => (int) $scheduler->updated_at,
            'created_at' => (int) $scheduler->created_at,
            'archived_at' => (int) $scheduler->deleted_at,
            'remaining_cycles' => (int) $scheduler->remaining_cycles,
        ];
    }
}
