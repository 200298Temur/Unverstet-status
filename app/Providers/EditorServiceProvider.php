<?php

namespace App\Providers;

use App\Services\EditorService;
use Illuminate\Support\ServiceProvider;

class EditorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(EditorService::class,function(){
            return  new EditorService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
