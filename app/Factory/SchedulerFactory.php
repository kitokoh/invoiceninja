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

use App\Models\Scheduler;

class SchedulerFactory
{
    public static function create($company_id, $user_id) :Scheduler
    {
        $scheduler = new Scheduler;

        $scheduler->name = '';
        $scheduler->company_id = $company_id;
        $scheduler->user_id = $user_id;
        $scheduler->parameters = [];
        $scheduler->is_paused = false;
        $scheduler->is_deleted = false;
        $scheduler->template = '';
        $scheduler->next_run = now()->format('Y-m-d');
        $scheduler->next_run_client = now()->format('Y-m-d');

        return $scheduler;
    }
}
