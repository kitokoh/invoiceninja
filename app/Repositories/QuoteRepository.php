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

use App\Models\Quote;
use App\Models\QuoteInvitation;

/**
 * QuoteRepository.
 */
class QuoteRepository extends BaseRepository
{
    public function save($data, Quote $quote) : ?Quote
    {
        return $this->alternativeSave($data, $quote);
    }

    public function getInvitationByKey($key) :?QuoteInvitation
    {
        return QuoteInvitation::query()->where('key', $key)->first();
    }
}
