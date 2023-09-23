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

use App\Utils\Ninja;
use Closure;
use Illuminate\Http\Request;

class SessionDomains
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Ninja::isSelfHost()) {
            return $next($request);
        }

        $domain_name = $request->getHost();

        if (strpos($domain_name, 'invoicing.co') !== false) {
            // config(['session.domain' => '.invoicing.co']);
        } else {
            config(['session.domain' => $domain_name]);
        }

        return $next($request);
    }
}
