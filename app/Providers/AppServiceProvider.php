<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TallStackUi\Facades\TallStackUi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // TallStackUi::personalize()
        //     ->button()
        //     ->block('wrapper.sizes.md', 'text-md px-4 py-1')
        //     ->block('wrapper.sizes.sm', 'text-sm px-2 py-1');
        TallStackUi::personalize()
            ->card()
            ->block('header.wrapper', 'dark:border-b-dark-600 flex items-center justify-between !w-full p-4');
    }
}
