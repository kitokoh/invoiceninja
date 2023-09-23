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

namespace App\DataMapper;

class PaymentMethodMeta
{
    /** @var string */
    public $exp_month;

    /** @var string */
    public $exp_year;

    /** @var string */
    public $brand;

    /** @var string */
    public $last4;

    /** @var int */
    public $type;

    /** @var string */
    public $state;
}
