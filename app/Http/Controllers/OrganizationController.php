<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResources\OrganizationFullResource;
use App\Http\Resources\OrganizationResources\OrganizationResource;
use App\Http\Resources\OrganizationResources\OrganizationTitleResource;
use App\Models\Organization;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    public function index()
    {
        $this->authorize('viewAny', Organization::class);
        $organizations = $this->organizationService->organizationRepository->getAll();

        return OrganizationResource::collection($organizations);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return new OrganizationFullResource(Organization::with('addresses', 'users')->find($id));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function getAllTitle()
    {
        //Регистрация на основе поддомена
        $organizations = $this->organizationService->organizationRepository->getAllWithAddresses();

        return OrganizationTitleResource::collection($organizations);
    }
}
