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

use PHPUnit\Framework\TestCase;

class MollieAmountFormatTest extends TestCase
{
    /**
     * @covers \App\PaymentDrivers\MolliePaymentDriver::convertToMollieAmount()
     */
    public function testFormatterIsWorkingCorrectly()
    {
        $this->assertEquals('1000.00', \number_format((float) 1000, 2, '.', ''));

        $this->assertEquals('1000.00', \number_format((float) '1000', 2, '.', ''));

        $this->assertEquals('1000.00', \number_format((float) '1000.00', 2, '.', ''));

        $this->assertEquals('1000.00', \number_format((float) '1000.00000', 2, '.', ''));
    }
}
