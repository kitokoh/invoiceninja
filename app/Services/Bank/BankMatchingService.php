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

namespace App\Services\Bank;

use App\Libraries\MultiDB;
use App\Models\BankTransaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;

class BankMatchingService implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function __construct(public $company_id, public $db)
    {
    }

    public function handle() :void
    {
        MultiDB::setDb($this->db);

        BankTransaction::query()->where('company_id', $this->company_id)
           ->where('status_id', BankTransaction::STATUS_UNMATCHED)
           ->cursor()
           ->each(function ($bt) {
               (new BankService($bt))->processRules();
           });
    }

    public function middleware()
    {
        return [(new WithoutOverlapping($this->company_id))];
    }
}
