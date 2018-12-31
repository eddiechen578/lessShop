<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Entities\Merchandise;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'site.layouts.default', 'App\Http\ViewComposers\NavComposer'
        );

//        View::composer('site.layouts.default', function ($view) {
//            $view->with('menu', Merchandise::all());
//        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
