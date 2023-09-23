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
use App\Models\ClientContact;
use App\Utils\Traits\MakesHash;

class SwitchCompanyController extends Controller
{
    use MakesHash;

    public function __invoke(string $contact)
    {
        $client_contact = ClientContact::where('email', auth()->user()->email)
            ->where('id', $this->transformKeys($contact))
            ->first();

        auth()->guard('contact')->loginUsingId($client_contact->id, true);

        request()->session()->regenerate();

        return redirect('/client/dashboard');
    }
}
