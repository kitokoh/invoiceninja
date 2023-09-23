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

use App\Models\Task;

class TaskFactory
{
    public static function create($company_id, $user_id) :Task
    {
        $task = new Task;

        $task->description = '';
        //$task->rate = '';
        $task->company_id = $company_id;
        $task->user_id = $user_id;
        $task->time_log = '[]';
        $task->is_running = false;
        $task->is_deleted = false;
        $task->duration = 0;

        return $task;
    }
}
