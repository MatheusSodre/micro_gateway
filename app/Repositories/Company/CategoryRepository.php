<?php

namespace App\Repositories\Company;
use App\Models\Company\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}
?>
