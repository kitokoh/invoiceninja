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


namespace App\Exceptions;

use Exception;

class PaymentFailed extends Exception
{
    public function report()
    {
        // ..
    }

    public function render($request)
    {
        if (auth()->guard('contact')->user() || ($request->has('cko-session-id') && $request->query('cko-session-id'))) {
            return render('gateways.unsuccessful', [
                'message' => $this->getMessage(),
                'code' => $this->getCode(),
            ]);
        }

        return response([
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ]);
    }
}
