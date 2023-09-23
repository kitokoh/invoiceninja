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

namespace App\Utils\ClientPortal\CustomMessage;

use Illuminate\Support\Facades\Facade;

class CustomMessageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'customMessage';
    }
}
