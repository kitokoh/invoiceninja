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

namespace App\Http\Middleware;

use App\Libraries\MultiDB;
use Closure;
use Illuminate\Http\Request;
use stdClass;

class SetEmailDb
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $error = [
            'message' => 'Email not set or not found',
            'errors' => new stdClass,
        ];

        if ($request->input('email') && config('ninja.db.multi_db_enabled')) {
            if (! MultiDB::userFindAndSetDb($request->input('email'))) {
                return response()->json($error, 400);
            }
        }

        return $next($request);
    }
}
