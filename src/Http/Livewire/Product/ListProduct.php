<?php

namespace Rizkihardinas\Product\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithPagination;
use Rizkihardinas\Product\Models\Product;
use Illuminate\Support\Facades\DB;

class ListProduct extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $products = Product::query()
            ->when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(config('rizkihardinas-product.paging', 10));

        return view('product::livewire.product.list', compact('products'));
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            DB::commit();
            $this->js('toastr.success("'.trans('global.deleted', ['attributes' => 'Product']).'")');
            $this->emit('productDeleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            $this->js('toastr.error("'.trans('global.failed', ['attributes' => 'Delete Product']).'")');
        }
    }
}
