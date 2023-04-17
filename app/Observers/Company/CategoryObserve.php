<?php

namespace App\Observers\Company;


use App\Models\Company\Category;
use Illuminate\Support\Str;
// use Illuminate\Support\Str;


class CategoryObserve
{
    /**
     * Handle the Category "creatind" after event / "created" before event .
     */
    public function creating(Category $category): void
    {
       $category->url = Str::slug($category->title,"-");
    }

    /**
     * Handle the Category "updating" after event / "created" before event.
     */
    public function updating(Category $category): void
    {
        $category->url = Str::slug($category->title,"-");
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}
