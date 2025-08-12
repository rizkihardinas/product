<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin/product',
    'as' => 'admin.product.',
    'middleware' => ['web'],
], function () {
    Route::get('/products', function () {
        return view('product::livewire.product-crud');
    })->name('products.index');
});
