<?php

namespace App\Services\Company;

use App\Repositories\Company\CompanyRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\JsonResponse;

class CompanyService
{


    /**
     * Create a new service instance.
     *
     * @param  CompanyRepository  $companyRepository
     * @return void
     */
    public function __construct(private CompanyRepository $companyRepository)
    {
        //
    }

    public function store(array $data)
    {
        return $this->companyRepository->create($data);
    }
    
    public function getAll($relations = [], $columns = ['*'])
    {
        return $this->companyRepository->all($relations, $columns);
    }

    public function getPaginate($relations = [], $limit = null, $columns = ['*'])
    {
        return $this->companyRepository->paginate($relations,$limit,$columns);
    }
    
    public function getCompanyByUUID(string $field, string $uuid = null)
    {
        return $this->companyRepository->getCompanyByUUID($field,$uuid);
    }

    public function updateCompanyByUUID($field,$request,$uuid):bool|null
    {
        return $this->companyRepository->updateCompanyByUUID($field,$uuid,$request);
    }

    public function destroyByUUID($filed,$id):bool|null
    {
        return $this->companyRepository->destroyByUUID($filed,$id);
    }
}
