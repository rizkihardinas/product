<?php

use Illuminate\Support\Facades\Route;
use Rizkihardinas\Product\Http\Controllers\Api\ProductController;
use Rizkihardinas\Product\Http\Controllers\Api\BarcodeController;

Route::group([
    'prefix' => 'v1/products',
    'middleware' => ['api', 'auth:sanctum'],
], function () {
    Route::get('/', [ProductController::class, 'index'])->name('api.products.index');
    Route::post('/', [ProductController::class, 'store'])->name('api.products.store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('api.products.show');
    Route::put('/{product}', [ProductController::class, 'update'])->name('api.products.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('api.products.destroy');
});

Route::group([
    'prefix' => 'v1/barcodes',
    'middleware' => ['api', 'auth:sanctum'],
], function () {
    Route::get('/', [BarcodeController::class, 'index'])->name('api.barcodes.index');
    Route::post('/', [BarcodeController::class, 'store'])->name('api.barcodes.store');
    Route::get('/{barcode}', [BarcodeController::class, 'show'])->name('api.barcodes.show');
    Route::put('/{barcode}', [BarcodeController::class, 'update'])->name('api.barcodes.update');
    Route::delete('/{barcode}', [BarcodeController::class, 'destroy'])->name('api.barcodes.destroy');
});
