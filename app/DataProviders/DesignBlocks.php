<?php

/**
* Africa Novatech (https://invoiceninja.com).
*
* @link https://github.com/invoiceninja/invoiceninja source repository
*
* @copyright Copyright (c) 2022. Africa Novatech LLC (https://invoiceninja.com)
*
* @license https://www.elastic.co/licensing/elastic-license
*/

namespace App\DataProviders;

class DesignBlocks
{
    public function __construct(
        public string $includes = '',
        public string $header = '',
        public string $body = '',
        public string $footer = ''
    ) {
    }
}
