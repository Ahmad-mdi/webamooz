<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['client.*'], function ($view) {
            $view->with([
                'categories' => Category::query()->where('parent_id', null)->get(),
                'brands' => Brand::all(),
            ]);
        });
        Category::observe(CategoryObserver::class);
    }
}
