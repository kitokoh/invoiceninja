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

namespace App\Http\Livewire;

use App\Libraries\MultiDB;
use Livewire\Component;

class PayNowDropdown extends Component
{
    public $total;

    public $methods;

    public $company;

    public function mount()
    {
        MultiDB::setDb($this->company->db);

        $this->methods = auth()->guard('contact')->user()->client->service()->getPaymentMethods($this->total);
    }

    public function render()
    {
        return render('components.livewire.pay-now-dropdown');
    }
}
