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

use App\Models\User;
use stdClass;

/**
 * Class DefaultSettings.
 */
class DefaultSettings extends BaseSettings
{
    /**
     * @var int
     */
    public static $per_page = 25;

    /**
     * @return stdClass
     */
    public static function userSettings() : stdClass
    {
        return (object) [
            //    class_basename(User::class) => self::userSettingsObject(),
        ];
    }

}