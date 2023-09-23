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

namespace App\Exceptions\Ninja;

use Exception;

class ClientPortalAuthorizationException extends Exception
{
    public function report()
    {
        // ..
    }

    public function render($request)
    {
        return view('errors.client-error', [
            'account' => auth()->guard('contact')->check() ? auth()->guard('contact')->user()->user->account : false,
            'company' => auth()->guard('contact')->check() ? auth()->guard('contact')->user()->company : false,
            'title' => ctrans('texts.error_title'),
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ]);
    }
}
