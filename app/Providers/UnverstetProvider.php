<?php

namespace App\Providers;

use App\Services\UnverstetService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class UnverstetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->singleton(UnverstetService::class,function(Application $app){
            return new UnverstetService();
        }); 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
