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

namespace App\Helpers\Document;

trait WithTypeHelpers
{
    /**
     * Returns boolean based on checks for image.
     *
     * @return bool
     */
    public function isImage(): bool
    {
        if (in_array($this->type, ['png', 'jpeg', 'jpg', 'tiff', 'gif'])) {
            return true;
        }

        return false;
    }
}
