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

class EmailBounceNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $account;

    public function __construct($account)
    {
        $this->account = $account;
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
        $content = "Email bounce notification for Account {$this->account->key} \n";

        $owner = $this->account->companies()->first()->owner();

        $content .= "Owner {$owner->present()->name() } | {$owner->email}";

        return (new SlackMessage)
                ->success()
                ->from(ctrans('texts.notification_bot'))
                ->image('/favicon.png')
                ->content($content);
    }
}
