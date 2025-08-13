<?php

namespace Rizkihardinas\Product\Http\Livewire\Barcode;

use Livewire\Component;
use Rizkihardinas\Product\Models\Barcode;

class DetailBarcode extends Component
{
    public $barcode;

    public function render()
    {
        return view('product::barcode.detail');
    }
}
