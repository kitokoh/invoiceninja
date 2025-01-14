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

namespace App\Jobs\Util;

use App\Models\Company;
use App\Utils\Traits\Pdf\PageNumbering;
use App\Utils\Traits\Pdf\PdfMaker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PreviewPdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, PdfMaker, PageNumbering;

    public $company;

    private $disk;

    public $design_string;

    /**
     * Create a new job instance.
     *
     * @param $design_string
     * @param Company $company
     */
    public function __construct($design_string, Company $company)
    {
        $this->company = $company;

        $this->design_string = $design_string;

        $this->disk = $disk ?? config('filesystems.default');
    }

    public function handle()
    {
        $pdf = $this->makePdf(null, null, $this->design_string);

        $numbered_pdf = $this->pageNumbering($pdf, $this->company);

        if ($numbered_pdf) {
            $pdf = $numbered_pdf;
        }

        return $pdf;
    }
}
