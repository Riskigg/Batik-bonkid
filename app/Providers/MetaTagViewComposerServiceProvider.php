<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MetaTagViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*', function ($view) {
            $meta['title'] = 'Toko Batik Bonkid'; 
            $meta['description'] = 'Toko Batik Bonkid'; 
            $meta['twitter'] = '@bonkid'; 
            $meta['keyword'] = 'Batik Tulis, batik cap'; 
            $meta['site'] = 'bonkid.sevenpion.com'; 
            $meta['image'] = asset('images/logo-bonkid.png'); 
            $view->with('meta', $meta);
        });
    }
}
