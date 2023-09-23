<?php

/**
* Africa Novatech (https://africanovatech.com).
*
* @link https://github.com/invoiceninja/invoiceninja source repository
*
* @copyright Copyright (c) 2022. Africa Novatech LLC (https://africanovatech.com)
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
