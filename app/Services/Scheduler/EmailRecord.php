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

namespace App\Services\Scheduler;

use App\Models\Scheduler;
use Illuminate\Support\Str;
use App\Utils\Traits\MakesHash;

class EmailRecord
{
    use MakesHash;

    public function __construct(public Scheduler $scheduler)
    {
    }

    public function run()
    {
        $class = 'App\\Models\\' . Str::camel($this->scheduler->parameters['entity']);

        $entity = $class::find($this->decodePrimaryKey($this->scheduler->parameters['entity_id']));
        
        if($entity)
            $entity->service()->sendEmail();

        $this->scheduler->forceDelete();
    }
}
