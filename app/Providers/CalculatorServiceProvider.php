<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Calculator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CalculatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Calculator::class , function($app){
            $user = Auth::user() ?? User::first();
            return new Calculator($user);
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
