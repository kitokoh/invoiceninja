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

namespace App\Listeners\Quote;

use App\Libraries\MultiDB;
use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use stdClass;

class QuoteViewedActivity implements ShouldQueue
{
    public $delay = 5;

    protected $activity_repo;

    /**
     * Create the event listener.
     *
     * @param ActivityRepository $activity_repo
     */
    public function __construct(ActivityRepository $activity_repo)
    {
        $this->activity_repo = $activity_repo;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        MultiDB::setDb($event->company->db);

        $event->invitation->quote->service()->markSent()->save();

        $fields = new stdClass;

        $fields->user_id = $event->invitation->quote->user_id;
        $fields->company_id = $event->invitation->company_id;
        $fields->activity_type_id = Activity::VIEW_QUOTE;
        $fields->client_id = $event->invitation->quote->client_id;
        $fields->client_contact_id = $event->invitation->client_contact_id;
        $fields->invitation_id = $event->invitation->id;
        $fields->quote_id = $event->invitation->quote_id;

        $this->activity_repo->save($fields, $event->invitation->quote, $event->event_vars);
    }
}
