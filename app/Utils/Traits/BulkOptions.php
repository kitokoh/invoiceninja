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

trait BulkOptions
{
    /**
     * Store method in requests.
     *
     * @var string
     */
    public static $STORE_METHOD = 'create';

    /**
     * Default chunk size.
     *
     * @var int
     */
    public static $CHUNK_SIZE = 100;

    /**
     * Default queue for bulk processing.
     *
     * @var string
     */
    public static $DEFAULT_QUEUE = 'bulk_processing';

    /**
     * Available bulk options - used in requests (eg. BulkClientRequests).
     *
     * @return array
     */
    public function getBulkOptions()
    {
        return [
            'create', 'edit', 'view',
        ];
    }

    /**
     * Shared rules for bulk requests.
     *
     * @return array
     */
    public function getGlobalRules()
    {
        return [
            'action' => ['required'],
        ];
    }
}
