<?php

namespace Rizkihardinas\Product\Http\Livewire\Barcode;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Rizkihardinas\Product\Models\Barcode;

class ListBarcode extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage;

    protected $listeners = ['barcodeUpdated' => '$refresh', 'barcodeCreated' => '$refresh'];

    public function mount()
    {
        $this->perPage = config('product.paging', 10);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $barcode = Barcode::findOrFail($id);
            $barcode->delete();

            DB::commit();
            $this->js('toastr.success("'.trans('global.deleted', ['attributes' => 'Barcode']).'")');
            $this->emit('barcodeDeleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            $this->js('toastr.error("'.trans('global.failed', ['attributes' => 'Delete Barcode']).'")');
        }
    }

    public function render()
    {
        $query = Barcode::with('product')
            ->when($this->search, fn($q) => $q->where('code', 'like', '%'.$this->search.'%'));

        $barcodes = $query->orderBy('id', 'desc')->paginate($this->perPage);

        return view('product::barcode.list', compact('barcodes'));
    }
}
