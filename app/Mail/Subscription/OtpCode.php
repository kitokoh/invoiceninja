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

namespace App\Mail\Subscription;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class OtpCode extends Mailable
{
    // use Queueable, SerializesModels;

    public $company;

    public $contact;

    public $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company, $contact, $code)
    {
        $this->company = $company;
        $this->contact = $contact;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        App::setLocale($this->company->locale());

        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(ctrans('texts.otp_code_subject'))
            ->text('email.admin.generic_text')
            ->view('email.admin.generic')
            ->with([
                'settings' => $this->company->settings,
                'logo' => $this->company->present()->logo(),
                'title' => ctrans('texts.otp_code_subject'),
                'content' => ctrans('texts.otp_code_body', ['code' => $this->code]),
                'whitelabel' => $this->company->account->isPaid(),
            ]);
    }
}
