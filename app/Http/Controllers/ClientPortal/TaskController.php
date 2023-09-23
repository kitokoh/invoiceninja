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

namespace App\Http\Controllers\ClientPortal;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientPortal\Tasks\ShowTasksRequest;

class TaskController extends Controller
{
    /**
     * Show the tasks in the client portal.
     *
     * @param ShowTasksRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ShowTasksRequest $request)
    {
        \Carbon\Carbon::setLocale(
            auth()->guard('contact')->user()->preferredLocale()
        );

        return render('tasks.index');
    }
}
