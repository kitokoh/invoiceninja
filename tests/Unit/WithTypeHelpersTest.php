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

use App\Models\Account;
use App\Models\Company;
use App\Models\Document;
use Tests\TestCase;

class WithTypeHelpersTest extends TestCase
{
    public function testIsImageHelper(): void
    {
        $account = Account::factory()->create();

        $company = Company::factory()->create([
            'account_id' => $account->id,
        ]);

        /** @var Document */
        $document = Document::factory()->create([
            'company_id' => $company->id,
            'type' => 'jpeg',
        ]);

        $this->assertTrue($document->isImage());

        /** @var Document */
        $document = Document::factory()->create([
            'company_id' => $company->id,
        ]);

        $this->assertFalse($document->isImage());
    }
}
