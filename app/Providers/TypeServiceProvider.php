<?php

namespace App\Providers;

use App\Services\TypeService;
use Illuminate\Support\ServiceProvider;

class TypeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TypeService::class,function(){
           return  new TypeService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
