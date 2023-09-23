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

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class TempRouteController extends Controller
{
    /**
     * Logs a user into the client portal using their contact_key
     * @param  string $hash  The hash
     * @return Redirect
     */
    public function index(string $hash)
    {
        $data = [];
        $data['html'] = Cache::get($hash);

        return view('pdf.html', $data);
    }
}
