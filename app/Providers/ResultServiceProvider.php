<?php

namespace App\Providers;

use App\Services\ResultService;
use Illuminate\Support\ServiceProvider;

class ResultServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ResultService::class,function(){
            return new ResultService();
        }); 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
