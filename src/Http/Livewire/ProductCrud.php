<?php

namespace Rizkihardinas\Product\Http\Livewire;

use Livewire\Component;
use Rizkihardinas\Product\Models\Product;

class ProductCrud extends Component
{
    public $products, $name, $price, $description, $product_id;
    public $isOpen = false;

    public function render()
    {
        $this->products = Product::all();
        return view('product::livewire.product-crud');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function store()
    {
        Product::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description
        ]);

        session()->flash('message', $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->isOpen = true;
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->price = '';
        $this->description = '';
        $this->product_id = '';
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
