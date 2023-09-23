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

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Locale
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
        /*LOCALE SET */
        if ($request->has('lang')) {
            $locale = $request->input('lang');
            App::setLocale($locale);
        } elseif (auth()->guard('contact')->user()) {
            App::setLocale(auth()->guard('contact')->user()->client()->setEagerLoads([])->first()->locale());
        } elseif (auth()->user()) {
            try {
                App::setLocale(auth()->user()->company()->getLocale());
            } catch (\Exception $e) {
            }
        } else {
            App::setLocale(config('ninja.i18n.locale'));
        }

        return $next($request);
    }
}
