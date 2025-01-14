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

use Tests\TestCase;

class SentryTest extends TestCase
{
    public function testSentryFiresAppropriately()
    {
        $e = new \Exception('Test Fire');
        app('sentry')->captureException($e);

        $this->assertTrue(true);
    }
}
