<?php

use Illuminate\Support\Facades\Route;
use Rizkihardinas\Product\Http\Livewire\ProductCrud; // <-- tambahkan ini

Route::group([
    'prefix' => 'admin/product',
    'as' => 'admin.product.',
    'middleware' => ['web'],
], function () {
    Route::get('/products', ProductCrud::class)->name('products.index');
});
