<?php

namespace App\Repositories\Evaluation;


use App\Interfaces\Evaluation\EvaluationRepositoryInterface;
use App\Models\Evaluation\Evaluation;
use App\Repositories\BaseRepository;

class EvaluationRepository extends BaseRepository implements EvaluationRepositoryInterface
{
    public function __construct(Evaluation $evaluation)
    {
        $this->model = $evaluation;
    }
    public function getEvaluationCompany(string $Company = null): mixed
    {
        return $this->model->where('company',$Company)->get();
    }
}
?>
