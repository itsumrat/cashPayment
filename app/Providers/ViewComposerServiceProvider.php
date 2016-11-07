<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->getThemeAssetUrl();
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

    public function getThemeAssetUrl()
    {
        view()->share('theme_assets', url('/assets'));
//        view()->composer('layouts.app', function ($view) {
//            $view->with('theme_assets', url('/assets'));
//        });
//        view()->composer('auth.login', function ($view) {
//            $view->with('theme_assets', url('/assets'));
//        });
    }
}
