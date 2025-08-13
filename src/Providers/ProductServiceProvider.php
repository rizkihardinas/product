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

        $this->registerLivewireComponents();

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/product'),
        ], 'product-views');
        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
        ], 'product-migrations');
    }
    protected function registerLivewireComponents()
    {
        // Product
        Livewire::component('product.list', \Rizkihardinas\Product\Http\Livewire\Product\ListProducts::class);
        Livewire::component('product.create', \Rizkihardinas\Product\Http\Livewire\Product\CreateProduct::class);
        Livewire::component('product.edit', \Rizkihardinas\Product\Http\Livewire\Product\EditProduct::class);
        Livewire::component('product.detail', \Rizkihardinas\Product\Http\Livewire\Product\DetailProduct::class);
        Livewire::component('product.assign-barcode', \Rizkihardinas\Product\Http\Livewire\Product\AssignBarcode::class);

        // Barcode
        Livewire::component('barcode.list', \Rizkihardinas\Product\Http\Livewire\Barcode\ListBarcodes::class);
        Livewire::component('barcode.create', \Rizkihardinas\Product\Http\Livewire\Barcode\CreateBarcode::class);
        Livewire::component('barcode.edit', \Rizkihardinas\Product\Http\Livewire\Barcode\EditBarcode::class);
        Livewire::component('barcode.detail', \Rizkihardinas\Product\Http\Livewire\Barcode\DetailBarcode::class);
    }
}
