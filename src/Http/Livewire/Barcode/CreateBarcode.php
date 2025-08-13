<?php

namespace Rizkihardinas\Product\Http\Livewire\Barcode;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Rizkihardinas\Product\Models\Barcode;
use Rizkihardinas\Product\Models\Product;

class CreateBarcode extends Component
{
    public $productable_id;
    public $productable_type = Product::class;
    public $code;

    protected $rules = [
        'productable_id' => 'required|exists:products,id',
        'productable_type' => 'required|string',
        'barcode' => 'required|string|max:255|unique:barcodes,barcode',
    ];

    public function save()
    {
        $data = $this->validate();

        DB::beginTransaction();
        try {
            $barcode = Barcode::create($data);

            DB::commit();

            $this->js('toastr.success("'.trans('global.saved', ['attributes' => 'Barcode']).'")');
            $this->reset(['productId', 'code']);
            $this->emit('barcodeCreated', $barcode->id);

            return redirect()->route('barcodes.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            $this->js('toastr.error("'.trans('global.failed', ['attributes' => 'Create Barcode']).'")');
        }
    }

    public function render()
    {
        $products = Product::all();
        return view('product::barcode.create', compact('products'));
    }
}
