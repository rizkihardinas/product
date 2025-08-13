<?php

namespace Rizkihardinas\Product\Http\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Rizkihardinas\Product\Models\Product;
use Rizkihardinas\Product\Models\Barcode;

class AssignBarcode extends Component
{
    public $product;
    public $barcode;
    public $search;

    protected $rules = [
        'barcode' => 'required|string|max:255|unique:barcodes,barcode',
    ];

    public function assign()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $b = $this->product->barcodes()->create([
                'barcode' => $this->barcode,
            ]);

            DB::commit();

            $this->js('toastr.success("'.trans('global.saved', ['attributes' => 'Barcode']).'")');
            $this->reset(['barcode']);
            $this->emit('barcodeAssigned', $b->id);

            return redirect()->route('products.detail', $this->product->id);
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            $this->js('toastr.error("'.trans('global.failed', ['attributes' => 'Assign Barcode']).'")');
        }
    }

    public function render()
    {
        $barcodes = $this->product->barcodes()->when($this->search,fn($q) => $q->where('barcode','like','%'.$this->search.'%'))->paginate(config('rizkihardinas-product.paging', 10));
        return view('product::product.assign-barcode', compact('barcodes'));
    }
}
