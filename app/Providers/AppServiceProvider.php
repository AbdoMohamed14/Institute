<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        $settings = Setting::find(1);

        View::share('settings', $settings );
        
        $articles_s = Article::inRandomOrder()->limit(3)->get();

        View::share('articles_s',$articles_s);

        Paginator::useBootstrap();
    
    }
}
