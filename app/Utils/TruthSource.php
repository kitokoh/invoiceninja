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

namespace App\Utils;

class TruthSource
{
    public $company;

    public $user;

    public $company_user;

    public $company_token;

    public function setCompanyUser($company_user)
    {
        $this->company_user = $company_user;

        return $this;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    public function setCompanyToken($company_token)
    {
        $this->company_token = $company_token;

        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getCompanyUser()
    {
        return $this->company_user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getCompanyToken()
    {
        return $this->company_token;
    }
}
