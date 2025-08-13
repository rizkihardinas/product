<?php

namespace Rizkihardinas\Product\Http\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Rizkihardinas\Product\Models\Product;

class EditProduct extends Component
{
    public $productId;
    public $name;
    public $description;
    public $price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
    ];

    public function mount($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
    }

    public function update()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $product = Product::findOrFail($this->productId);
            $product->update([
                'name' => $this->name,
                'price' => $this->price,
                'description' => $this->description,
            ]);

            DB::commit();

            $this->js('toastr.success("'.trans('global.updated', ['attributes' => 'Product']).'")');
            $this->emit('productUpdated', $product->id);

            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            $this->js('toastr.error("'.trans('global.failed', ['attributes' => 'Update Product']).'")');
        }
    }

    public function render()
    {
        return view('product::product.edit');
    }
}
