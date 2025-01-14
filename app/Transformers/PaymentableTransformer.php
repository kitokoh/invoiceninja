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

namespace App\Transformers;

use App\Models\Credit;
use App\Models\Paymentable;
use App\Utils\Traits\MakesHash;

class PaymentableTransformer extends EntityTransformer
{
    use MakesHash;

    protected $serializer;

    protected $defaultIncludes = [];

    protected $availableIncludes = [];

    public function __construct($serializer = null)
    {
        $this->serializer = $serializer;
    }

    public function transform(Paymentable $paymentable)
    {
        $entity_key = 'invoice_id';

        if ($paymentable->paymentable_type == Credit::class) {
            $entity_key = 'credit_id';
        }

        return  [
            'id' => $this->encodePrimaryKey($paymentable->id),
            $entity_key => $this->encodePrimaryKey($paymentable->paymentable_id),
            'amount' => (float) $paymentable->amount,
            'refunded' => (float) $paymentable->refunded,
            'created_at' => (int) $paymentable->created_at,
            'updated_at' => (int) $paymentable->updated_at,
            'archived_at' => (int) $paymentable->deleted_at,
        ];
    }
}
