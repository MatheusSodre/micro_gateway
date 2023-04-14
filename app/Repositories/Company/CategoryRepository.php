<?php

namespace App\Repositories\Company;

use App\Interfaces\Company\CategoryRepositoryInterface;
use App\Models\Company\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
    
    
}
?>
