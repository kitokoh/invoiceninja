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

namespace Tests\Feature;

use Tests\TestCase;
use Tests\MockAccountData;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * @test
 * @covers App\Http\Controllers\ActivityController
 */
class ActivityApiTest extends TestCase
{
    use DatabaseTransactions;
    use MockAccountData;

    protected function setUp() :void
    {
        parent::setUp();

        $this->makeTestData();

        $this->withoutMiddleware(
            ThrottleRequests::class
        );
        
        $this->withoutExceptionHandling();

    }

    public function testActivityEntity()
    {
    
        $invoice = $this->company->invoices()->first();

        $invoice->service()->markSent()->markPaid()->markDeleted()->handleRestore()->save();

        $data = [
            'entity' => 'invoice',
            'entity_id' => $invoice->hashed_id
        ];

        $response = false;

        try {
            $response = $this->withHeaders([
                'X-API-SECRET' => config('ninja.api_secret'),
                'X-API-TOKEN' => $this->token,
            ])->postJson('/api/v1/activities/entity', $data);
        } catch (ValidationException $e) {
            $message = json_decode($e->validator->getMessageBag(), 1);
            nlog($message);
        }

        $response->assertStatus(200);


    }

    public function testActivityGet()
    {
        $response = $this->withHeaders([
            'X-API-SECRET' => config('ninja.api_secret'),
            'X-API-TOKEN' => $this->token,
        ])->get('/api/v1/activities/');

        $response->assertStatus(200);
    }

    public function testActivityGetWithReact()
    {
        $response = $this->withHeaders([
            'X-API-SECRET' => config('ninja.api_secret'),
            'X-API-TOKEN' => $this->token,
        ])->get('/api/v1/activities?react=true');

        $response->assertStatus(200);
    }
}
