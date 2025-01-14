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

namespace App\Events\Expense;

use App\Models\Company;
use App\Models\Expense;
use Illuminate\Queue\SerializesModels;

/**
 * Class ExpenseWasRestored.
 */
class ExpenseWasRestored
{
    use SerializesModels;

    /**
     * @var Expense
     */
    public $expense;

    public $company;

    public $event_vars;

    public $fromDeleted;

    /**
     * Create a new event instance.
     *
     * @param Expense $expense
     * @param Company $company
     * @param array $event_vars
     */
    public function __construct(Expense $expense, $fromDeleted, Company $company, array $event_vars)
    {
        $this->expense = $expense;
        $this->fromDeleted = $fromDeleted;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }
}
