<?php

namespace App\Http\Controllers\Api\Company;


use App\Http\Controllers\Controller;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(protected CompanyService $companyService)
    {
        $this->middleware('permission:visualizar_empresas')->only('index');
        $this->middleware('permission:visualizar_empresa')->only('show');
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
        return $this->companyService->getCompanyId($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->companyService->updateCompanyId($id,$request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->companyService->deleteCompany($id);
    }
}
