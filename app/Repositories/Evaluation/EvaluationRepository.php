<?php

namespace App\Repositories\Evaluation;


use App\Models\Evaluation\Evaluation;
use App\Repositories\BaseRepository;

class EvaluationRepository extends BaseRepository
{
    public function __construct(Evaluation $evaluation)
    {
        $this->model = $evaluation;
    }
}
?>
