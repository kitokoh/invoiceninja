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

namespace App\DataMapper\Schedule;

class EmailRecord
{
    /**
     * Defines the template name
     *
     * @var string
     */
    public string $template = 'email_record';

    /**
     * Defines the template name
     *
     * @var string
     */
    public string $entity = ''; // invoice, credit, quote, purchase_order

    /**
     * Defines the template name
     *
     * @var string
     */
    public string $entity_id = '';
}
