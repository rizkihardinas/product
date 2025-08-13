<?php

namespace Rizkihardinas\Product\Http\Livewire\Product;

use Livewire\Component;
use Rizkihardinas\Product\Models\Product;

class DetailProduct extends Component
{
    public $product;

    public function mount($id)
    {
        $this->product = Product::with('barcodes')->findOrFail($id);
    }

    public function render()
    {
        return view('product::product.detail', [
            'product' => $this->product
        ]);
    }
}
