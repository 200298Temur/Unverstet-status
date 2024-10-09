<?php

namespace App\Providers;

use App\Models\Service;
use App\Services\ProgramService;
use Illuminate\Support\ServiceProvider;

class ProgramServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
      $this->app->singleton(ProgramService::class,function(){
            return new ProgramService();
        });  
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
