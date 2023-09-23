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
use App\Models\PaymentType;
use Illuminate\Support\Facades\Lang;

/**
 * @test
 * @covers App\Models\PaymentType
 */
class PaymentTypeTest extends TestCase
{

    protected function setUp() :void
    {
        parent::setUp();

    }

    public function testTranslationsExist()
    {
        $payment_type_class = new PaymentType;

        foreach($payment_type_class->type_names as $type)
        {
            $this->assertTrue(Lang::has("texts.{$type}"));
        }
    }
}
