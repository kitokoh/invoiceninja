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

namespace App\DataMapper\Tax;

interface RuleInterface
{
    public function init();

    public function tax($item);

    public function taxByType($type);

    public function taxExempt($item);
    
    public function taxDigital($item);

    public function taxService($item);

    public function taxShipping($item);

    public function taxPhysical($item);

    public function taxReduced($item);

    public function default($item);

    public function override($item);

    public function calculateRates();
}