<?php

namespace App\Repositories\Company;
use App\Interfaces\Company\CompanyRepositoryInterface;
use App\Models\Company\Company;
use App\Repositories\BaseRepository;

class CompanyRepository  extends BaseRepository implements CompanyRepositoryInterface
{
    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    public function getCompanyByUUID(string $field,string $uuid = null)
    {
        return $this->model->where($field, $uuid)->firstOrFail();
    }
    public function updateCompanyByUUID(string $field,string $uuid = null,array $data)
    {
        return $this->getCompanyByUUID($field,$uuid)->update($data);
    }
    public function destroyByUUID(string $field,string $uuid) 
    {
        return $this->getCompanyByUUID($field,$uuid)->delete(); 
    }
}
?>
