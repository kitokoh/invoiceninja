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

use App\Jobs\Util\UnlinkFile;
use App\Jobs\Util\UploadAvatar;

/**
 * Class Uploadable.
 */
trait Uploadable
{
    public function removeLogo($company)
    {
        (new UnlinkFile(config('filesystems.default'), $company?->settings?->company_logo))->handle();
    }

    public function uploadLogo($file, $company, $entity)
    {
        if ($file) {
            $path = (new UploadAvatar($file, $company->company_key))->handle();
            if ($path) {
                $settings = $entity->settings;
                $settings->company_logo = $path;
                $entity->settings = $settings;
                $entity->save();
            }
        }
    }
}
