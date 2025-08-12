<?php

use Illuminate\Support\Facades\Route;
use Rizkihardinas\Product\Models\Product;

Route::prefix('products')->group(function () {
    Route::get('/', function () {
        return Product::all();
    });

    Route::get('/{id}', function ($id) {
        return Product::findOrFail($id);
    });

    Route::post('/', function () {
        return Product::create(request()->all());
    });

    Route::put('/{id}', function ($id) {
        $product = Product::findOrFail($id);
        $product->update(request()->all());
        return $product;
    });

    Route::delete('/{id}', function ($id) {
        Product::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted successfully']);
    });
});
