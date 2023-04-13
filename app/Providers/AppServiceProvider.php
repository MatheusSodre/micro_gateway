<?php

namespace App\Providers;

use App\Models\Company\{
    Category
};

use App\Observers\Company\{
    CategoryObserver
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Category::observe(CategoryObserver::class);
    }
}
