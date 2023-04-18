<?php

namespace App\Providers;

use App\Interfaces\Company\CategoryRepositoryInterface;
use App\Models\Company\{
    Category,
    Company

};
use App\Observers\Company\{
    CategoryObserve,
    CompanyObserve
};


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
         Category::observe(CategoryObserve::class);
         Company::observe(CompanyObserve::class);
    }
}
