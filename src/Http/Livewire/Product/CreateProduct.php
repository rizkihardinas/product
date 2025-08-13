<?php

namespace Rizkihardinas\Product\Http\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Rizkihardinas\Product\Models\Product;

class CreateProduct extends Component
{
    public $name;
    public $price;
    public $description;

    public function save()
    {
        DB::beginTransaction();

        try {
            Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'description' => $this->description,
            ]);

            DB::commit();

            $this->js('toastr.success("'.trans('global.saved', ['attributes' => 'Product created']).'")');
            $this->reset(['name', 'price', 'description']);
            $this->dispatch('refreshTable'); // jika ingin refresh list
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->js('toastr.error("'.trans('global.failed', ['attributes' => 'Product']).'")');
            report($th);
        }
    }

    public function render()
    {
        return view('product::product.create');
    }
}
