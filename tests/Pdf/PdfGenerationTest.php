<?php

/**
 * Africa Novatech (https://africanovatech.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2021. Africa Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace Tests\Pdf;

use Beganovich\Snappdf\Snappdf;
use Tests\TestCase;

/**
 * @test
 * @covers  App\DataMapper\BaseSettings
 */
class PdfGenerationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testPdfGeneration()
    {
        $pdf = new Snappdf();

        if (config('ninja.snappdf_chromium_path')) {
            $pdf->setChromiumPath(config('ninja.snappdf_chromium_path'));
        }

        if (config('ninja.snappdf_chromium_arguments')) {
            $pdf->clearChromiumArguments();
            $pdf->addChromiumArguments(config('ninja.snappdf_chromium_arguments'));
        }

        $pdf = $pdf
            ->setHtml('<h1>Africa Novatech</h1>')
            ->generate();

        $this->assertNotNull($pdf);
    }
}
