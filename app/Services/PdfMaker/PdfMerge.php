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

namespace App\Services\PdfMaker;

use \setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\PdfParser\StreamReader;

class PdfMerge
{
    public function __construct(private array $file_paths)
    {
    }

    public function run()
    {
        $pdf = new FPDI();

        foreach ($this->file_paths as $file) {
            $pageCount = $pdf->setSourceFile(StreamReader::createByString(Storage::get($file)));
            for ($i = 0; $i < $pageCount; $i++) {
                $tpl = $pdf->importPage($i + 1, '/MediaBox');
                $pdf->addPage();
                $pdf->useTemplate($tpl);
            }
        }

        return $pdf->Output('S');
    }
}
