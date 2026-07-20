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
        TallStackUi::customize()
            ->layout()
            ->block('main')
            ->replace('p-10', 'p-6 md:p-8 lg:p-10');

        // TallStackUi::customize()
        //     ->sideBar('item')
        //     ->block('item.icon')
        //     ->replace('h-6 w-6', 'h-5 w-5');

        // TallStackUi::customize()
        //     ->sideBar('separator')
        //     ->block('line.base')
        //     ->replace('text-base', 'text-xs')
        //     ->replace('font-semibold', 'font-medium');

        // TallStackUi::customize()
        //     ->scope('without-padding')
        //     ->card()
        //     ->block('body')
        //     ->replace('px-4 py-5', 'p-0');

        TallStackUi::customize()
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

        TallStackUi::customize()
            ->scope('without-padding')
            ->button()
            ->block('wrapper.sizes.md')
            ->replace('px-4 py-2', 'px-2 py-1');

        // TallStackUi::customize()
        //     ->card()
        //     ->block('footer.wrapper')
        //     ->replace('p-4', 'px-4 py-2');

        TallStackUi::customize()
            ->table()
            ->block('table.td')
            ->replace('py-4', 'py-3');
    }
}
