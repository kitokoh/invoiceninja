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

namespace Tests\Integration;

use App\Repositories\ActivityRepository;
use App\Utils\Ninja;
use App\Utils\Traits\MakesHash;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\MockAccountData;
use Tests\TestCase;

/**
 * @test
 * @covers App\Http\Controllers\ActivityController
 */
class DownloadHistoricalInvoiceTest extends TestCase
{
    use MockAccountData;
    use DatabaseTransactions;
    use MakesHash;

    protected function setUp() :void
    {
        parent::setUp();

        $this->makeTestData();

        if (config('ninja.testvars.travis') !== false) {
            $this->markTestSkipped('Skip test for Travis');
        }
    }

    private function mockActivity()
    {
        $activity_repo = new ActivityRepository();

        $obj = new \stdClass;
        $obj->invoice_id = $this->invoice->id;
        $obj->user_id = $this->invoice->user_id;
        $obj->company_id = $this->company->id;

        $activity_repo->save($obj, $this->invoice, Ninja::eventVars());
    }

    public function testActivityAccessible()
    {
        $this->mockActivity();

        $this->assertNotNull($this->invoice->activities);
    }
}
