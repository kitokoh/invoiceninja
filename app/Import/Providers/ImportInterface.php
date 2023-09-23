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

namespace App\Import\Providers;

interface ImportInterface
{
    public function import(string $entity);

    public function transform(array $data);

    public function client();

    public function product();

    public function invoice();

    public function payment();

    public function vendor();

    public function expense();
}
