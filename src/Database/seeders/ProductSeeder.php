<?php

namespace Rizkihardinas\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Rizkihardinas\Product\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Sample Product',
            'price' => 100000,
            'description' => 'This is a sample product'
        ]);

        Product::factory()->count(5)->create();
    }
}
