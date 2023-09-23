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

namespace App\Mail\Admin;

use Illuminate\Mail\Mailable;

class EntityNotificationMailer extends Mailable
{
    public $mail_obj;

    /**
     * Create a new message instance.
     *
     * @param $mail_obj
     */
    public function __construct($mail_obj)
    {
        $this->mail_obj = $mail_obj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject($this->mail_obj->subject)
                    ->markdown($this->mail_obj->markdown, $this->mail_obj->data);
    }
}
