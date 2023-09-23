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

namespace App\Notifications\Ninja;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class WePayFailureNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $company_id;

    public function __construct($company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * 
     */
    public function toMail($notifiable)
    {
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toSlack($notifiable)
    {
        $ip = '';

        if (request()) {
            $ip = request()->getClientIp();
        }

        return  (new SlackMessage)
                ->success()
                ->from(ctrans('texts.notification_bot'))
                ->image('/favicon.png')
                ->content("New WePay ACH Failure from Company ID: {$this->company_id} IP: {$ip}");
    }
}
