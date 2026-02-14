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
        TallStackUi::personalize()
            ->layout()
            ->block('main')
            ->replace('p-10', 'p-6');

        TallStackUi::personalize()
            ->sideBar('item')
            ->block('item.icon')
            ->replace('h-6 w-6', 'h-5 w-5');

        TallStackUi::personalize()
            ->sideBar('separator')
            ->block('line.base')
            ->replace('text-base', 'text-xs')
            ->replace('font-semibold', 'font-medium');

        TallStackUi::personalize()
            ->scope('without-padding')
            ->card()
            ->block('body')
            ->replace('px-4 py-5', 'p-0');

        TallStackUi::personalize()
            ->button()
            ->block('wrapper.sizes.lg', 'text-base font-semibold px-6 py-2.5')
            ->and()
            ->button()
            ->block('wrapper.sizes.md', 'text-sm font-semibold px-4 py-2')
            ->and()
            ->button()
            ->block('wrapper.sizes.sm', 'text-xs font-medium px-2 py-1.5')
            ->and()
            ->button()
            ->block('wrapper.sizes.xs', 'text-xs font-medium px-2 py-0.5');

        TallStackUi::personalize()
            ->card()
            ->block('footer.wrapper')
            ->replace('p-4', 'px-4 py-2');
    }
}
