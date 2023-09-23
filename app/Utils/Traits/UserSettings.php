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

use stdClass;

/**
 * Class UserSettings.
 */
trait UserSettings
{
    /**
     * @param string $entity
     * @return stdClass
     */
    public function getEntity(string $entity) : stdClass
    {
        return $this->settings()->{$entity};
    }

    /**
     * @param string $entity
     * @return stdClass
     */
    public function getColumnVisibility(string $entity) : stdClass
    {
        return $this->settings()->{class_basename($entity)}->datatable->column_visibility;
    }
}
