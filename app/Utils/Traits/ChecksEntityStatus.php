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

/**
 * Class ChecksEntityStatus.
 */
trait ChecksEntityStatus
{
    public function entityIsDeleted($entity)
    {
        return $entity->is_deleted;
    }

    public function disallowUpdate()
    {
        return response()->json(['message'=>'Record is deleted and cannot be edited. Restore the record to enable editing'], 400);
    }
}
