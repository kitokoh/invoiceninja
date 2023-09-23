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

namespace App\Repositories;

use App\Factory\VendorFactory;
use App\Models\Vendor;
use App\Utils\Traits\GeneratesCounter;

/**
 * VendorRepository.
 */
class VendorRepository extends BaseRepository
{
    use GeneratesCounter;

    protected $contact_repo;

    /**
     * VendorContactRepository constructor.
     */
    public function __construct(VendorContactRepository $contact_repo)
    {
        $this->contact_repo = $contact_repo;
    }

    /**
     * Saves the vendor and its contacts.
     *
     * @param array $data The data
     * @param \App\Models\Vendor $vendor The vendor
     *
     * @return     vendor|\App\Models\Vendor|null  Vendor Object
     * @throws \Laracasts\Presenter\Exceptions\PresenterException
     */
    public function save(array $data, Vendor $vendor) : ?Vendor
    {
        $saveable_vendor = $data;

        if(array_key_exists('contacts', $data)) {
            unset($saveable_vendor['contacts']);
        }

        $vendor->fill($saveable_vendor);
                
        $vendor->saveQuietly();

        if ($vendor->number == '' || ! $vendor->number) {
            $vendor->number = $this->getNextVendorNumber($vendor);
        } //todo write tests for this and make sure that custom vendor numbers also works as expected from here

        $vendor->saveQuietly();

        if (isset($data['contacts'])) {
            $this->contact_repo->save($data, $vendor);
        }

        if (empty($data['name'])) {
            $data['name'] = $vendor->present()->name();
        }

        if (array_key_exists('documents', $data)) {
            $this->saveDocuments($data['documents'], $vendor);
        }

        return $vendor;
    }

    /**
     * Store vendors in bulk.
     *
     * @param array $vendor
     * @return vendor|null
     */
    public function create($vendor): ?Vendor
    {
        return $this->save(
            $vendor,
            VendorFactory::create(auth()->user()->company()->id, auth()->user()->id)
        );
    }
}
