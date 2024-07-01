<?php

namespace App\Services;

use App\Repositories\OrganizationRepository;

class OrganizationService
{
    public $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }
}
