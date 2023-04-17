<?php

namespace App\Providers;

use App\Interfaces\Company\CategoryRepositoryInterface;
use App\Models\Company\{
    Category
};

use App\Observers\Company\{
    CategoryObserver
};
use App\Repositories\Company\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Category::observe(CategoryObserver::class);
    }
}
