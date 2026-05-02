<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cloudinary\Cloudinary;

class CloudinaryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Cloudinary::class, function ($app) {
            return new Cloudinary([
                'cloud_name' => 'dqflffa1o',
                'api_key' => '934773358234285',
                'api_secret' => 'GV5IttBrxjmDF5wsDO9jL7KCAUY',
                'cloud_url' => 'cloudinary://934773358234285:GV5IttBrxjmDF5wsDO9jL7KCAUY@dqflffa1o',
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
