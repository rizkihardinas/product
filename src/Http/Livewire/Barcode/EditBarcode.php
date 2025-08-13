<?php

namespace Rizkihardinas\Product\Http\Livewire\Barcode;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Rizkihardinas\Product\Models\Barcode;
use Rizkihardinas\Product\Models\Product;

class EditBarcode extends Component
{
    public $barcodeModel;
    public $code;

    protected function rules()
    {
        return [
            'barcode' => 'required|string|max:255|unique:barcodes,barcode,' . $this->barcodeModel->id,
        ];
    }

    public function mount($id)
    {
        $this->barcodeModel = $this->barcodeModel->code;
    }

    public function update()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $this->barcodeModel->update([
                'code' => $this->code,
            ]);

            DB::commit();

            $this->js('toastr.success("'.trans('global.updated', ['attributes' => 'Barcode']).'")');
            $this->emit('barcodeUpdated', $this->barcodeModel->id);

            return redirect()->route('barcodes.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            $this->js('toastr.error("'.trans('global.failed', ['attributes' => 'Update Barcode']).'")');
        }
    }

    public function render()
    {
        return view('product::barcode.edit');
    }
}
