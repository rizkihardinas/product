<?php

namespace Rizkihardinas\Product\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Rizkihardinas\Product\Http\Livewire\ProductCrud;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'product');
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');

        Livewire::component('product-crud', ProductCrud::class);

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/product'),
        ], 'product-views');
    }
}
