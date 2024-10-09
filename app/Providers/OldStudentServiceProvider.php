<?php

namespace App\Providers;

use App\Services\OldStudentService;
use Illuminate\Support\ServiceProvider;

class OldStudentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->singleton(OldStudentService::class,function(){
            return new OldStudentService();
        }); 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
