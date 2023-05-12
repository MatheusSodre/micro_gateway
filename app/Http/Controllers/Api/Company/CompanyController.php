<?php

namespace App\Http\Controllers\Api\Company;


use App\Http\Controllers\Controller;


use App\Services\Company\CompanyService;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(protected CompanyService $companyService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Response()->json($this->companyService->getAllCompanies());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Response()->json($this->companyService->newCompany($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Response()->json($this->companyService->getCompanyId($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}