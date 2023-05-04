<?php

namespace App\Services\Evaluation;
use App\Repositories\Evaluation\EvaluationRepository;
use App\Services\ServicesExternal\Company\CompanyService;



class EvaluationService
{


    /**
     * Create a new service instance.
     *
     * @param  EvaluationRepository  $evaluationRepository
     * @return void
     */
    public function __construct(private EvaluationRepository $evaluationRepository,private CompanyService $companyService)
    {
        //
    }

    
    public function getEvaluationCompany(string $company)
    {
        return $this->evaluationRepository->getEvaluationCompany($company);
    }

    public function store(array $data,$company)
    {
        $response = $this->companyService->getCompany($company);
        
        return $this->evaluationRepository->create($data);
    }


    public function destroy($id):bool|null
    {
        return $this->evaluationRepository->delete($id);
    }
}
