<?php

namespace App\Services\Evaluation;
use App\Repositories\Evaluation\EvaluationRepository;


class EvaluationService
{


    /**
     * Create a new service instance.
     *
     * @param  EvaluationRepository  $evaluationRepository
     * @return void
     */
    public function __construct(private EvaluationRepository $evaluationRepository)
    {
        //
    }

    public function store(array $data)
    {
        return $this->evaluationRepository->create($data);
    }


    public function getAll(string $field, string $uuid)
    {
        // return $this->evaluationRepository->all();
        return $this->evaluationRepository->findOrFail($field, $uuid);
    }


    public function destroy($id):bool|null
    {
        return $this->evaluationRepository->delete($id);
    }
}
