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
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PaymentRefundFailed extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function render($request)
    {
        // $msg = 'Unable to refund the transaction';
        $msg = ctrans('texts.warning_local_refund');

        if ($this->getMessage() && strlen($this->getMessage()) > 1) {
            $msg = $this->getMessage();
        }

        return response()->json([
            'message' => $msg,
        ], 401);
    }
}
