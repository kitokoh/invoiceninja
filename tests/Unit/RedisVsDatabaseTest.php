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

namespace Tests\Unit;

use App\Models\Currency;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

/**
 * @test
 */
class RedisVsDatabaseTest extends TestCase
{
    protected function setUp() :void
    {
        parent::setUp();

        // $this->markTestSkipped('Skip test no company gateways installed');
    }

    public function testRedisSpeed()
    {
        $start = microtime(true);

        $currencies = Cache::get('currencies');

        $currencies->filter(function ($item) {
            return $item->id == 17;
        })->first();

        nlog(microtime(true) - $start);

        $this->assertTrue(true);
        // nlog($total_time);
        //0.0012960433959961
    }

    public function testDbSpeed()
    {
        $start = microtime(true);

        $currency = Currency::find(17);

        nlog(microtime(true) - $start);

        $this->assertTrue(true);
        // nlog($total_time);
        // 0.006152868270874
    }
}
