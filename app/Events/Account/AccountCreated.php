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

namespace App\Events\Account;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class AccountCreated.
 */
class AccountCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $company;

    public $event_vars;

    /**
     * Create a new event instance.
     *
     * @param $user
     * @param $company
     * @param $event_vars
     */
    public function __construct($user, $company, $event_vars)
    {
        $this->user = $user;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }

    // /**
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return Channel|array
    //  */
     public function broadcastOn()
     {
        return [];
       //  return new PrivateChannel('channel-name');
     }
}
