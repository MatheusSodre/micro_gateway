<?php 
namespace App\Interfaces\Company;
use App\Interfaces\BaseRepositoryInterface;

 interface CompanyRepositoryInterface extends BaseRepositoryInterface
 {
    public function getCompanyByUUID(string $fild,string $uuid = null);
    public function updateCompanyByUUID(string $field,string $uuid = null,array $data);
    public function destroyByUUID(string $uuid);
 }

?>