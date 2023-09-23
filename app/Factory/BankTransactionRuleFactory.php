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

namespace App\Factory;

use App\Models\BankTransactionRule;

class BankTransactionRuleFactory
{
    public static function create(int $company_id, int $user_id) :BankTransactionRule
    {
        $bank_transaction_rule = new BankTransactionRule;
        $bank_transaction_rule->user_id = $user_id;
        $bank_transaction_rule->company_id = $company_id;

        $bank_transaction_rule->name = '';
        $bank_transaction_rule->rules = [];
        
        return $bank_transaction_rule;
    }
}
