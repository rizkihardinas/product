<?php

use Illuminate\Support\Facades\Route;
use Rizkihardinas\Product\Http\Livewire\Product\ListProduct;
use Rizkihardinas\Product\Http\Livewire\Product\CreateProduct;
use Rizkihardinas\Product\Http\Livewire\Product\EditProduct;
use Rizkihardinas\Product\Http\Livewire\Product\DetailProduct;
use Rizkihardinas\Product\Http\Livewire\Product\AssignBarcode;
use Rizkihardinas\Product\Http\Livewire\Barcode\ListBarcode;
use Rizkihardinas\Product\Http\Livewire\Barcode\CreateBarcode;
use Rizkihardinas\Product\Http\Livewire\Barcode\EditBarcode;
use Rizkihardinas\Product\Http\Livewire\Barcode\DetailBarcode;

Route::group([
    'prefix' => 'admin/products',
    'as' => 'admin.product.',
    'middleware' => ['web', 'auth'],
], function () {
    // Product
    Route::get('/products', ListProduct::class)->name('product.index');
    Route::get('/products/create', CreateProduct::class)->name('product.create');
    Route::get('/products/{product}/edit', EditProduct::class)->name('product.edit');
    Route::get('/products/{product}', DetailProduct::class)->name('product.detail');
    Route::get('/products/{product}/assign-barcode', AssignBarcode::class)->name('product.assign-barcode');

    // Barcode
    Route::get('/barcodes', ListBarcode::class)->name('barcode.index');
    Route::get('/barcodes/create', CreateBarcode::class)->name('barcode.create');
    Route::get('/barcodes/{barcode}/edit', EditBarcode::class)->name('barcode.edit');
    Route::get('/barcodes/{barcode}', DetailBarcode::class)->name('barcode.detail');
});
