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

namespace App\Repositories;

use App\Models\Document;

/**
 * Class for document repository.
 */
class DocumentRepository extends BaseRepository
{
    public function delete($document)
    {
        $document->deleteFile();
        $document->forceDelete();
    }

    public function restore($document)
    {
        // if (! $document->trashed()) {
        //     return;
        // }

        // $document->restore();
    }

    public function archive($document)
    {
    }
}
