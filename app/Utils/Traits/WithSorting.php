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

namespace App\Utils\Traits;

trait WithSorting
{
    public $sort_field = 'id'; // Default sortBy. Feel free to change or pull from client/company settings.

    public $sort_asc = true;

    public function sortBy($field)
    {
        $this->sort_field === $field
            ? $this->sort_asc = ! $this->sort_asc
            : $this->sort_asc = true;

        $this->sort_field = $field;
    }
}
