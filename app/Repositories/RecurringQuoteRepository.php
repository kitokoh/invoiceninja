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

namespace App\Repositories;

use App\Helpers\Invoice\InvoiceSum;
use App\Models\RecurringQuote;
use Illuminate\Http\Request;

/**
 * RecurringQuoteRepository.
 */
class RecurringQuoteRepository extends BaseRepository
{
    public function save(Request $request, RecurringQuote $quote) : ?RecurringQuote
    {
        $quote->fill($request->input());

        $quote->save();

        $quote_calc = new InvoiceSum($quote);

        $quote = $quote_calc->build()->getQuote();

        return $quote;
    }
}
