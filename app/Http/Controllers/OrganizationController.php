<?php

namespace App\Http\Controllers;

use App\Services\FnsApiService;

class OrganizationController extends Controller
{
    protected $fnsApiService;

    public function __construct(FnsApiService $fnsApiService)
    {
        $this->fnsApiService = $fnsApiService;
    }

    public function index()
    {
        return view('organization.index');
    }

    public function findOrganization(Request $request)
    {
        $query = $response->query;
        return response()->success($this->fnsApiService->findOrganizationById($query));
    }

}
