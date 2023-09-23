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

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMailServer extends Mailable
{
    //   use Queueable, SerializesModels;

    public $support_messages;

    public $from_email;

    public function __construct($support_messages, $from_email)
    {
        $this->support_messages = $support_messages;
        $this->from_email = $from_email;
    }

    /**
     * Test Server mail.
     *
     * @return $this
     */
    public function build()
    {
        $settings = new \stdClass;
        $settings->primary_color = '#4caf50';
        $settings->email_style = 'dark';
        $settings->email_alignment = 'left';
        
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(ctrans('texts.email'))
            ->markdown('email.support.message', [
                'support_message' => $this->support_messages,
                'system_info' => '',
                'laravel_log' => [],
                'settings' => $settings,
            ]);
    }
}
