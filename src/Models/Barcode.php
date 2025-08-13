<?php

namespace Rizkihardinas\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barcode extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    
    function productable(){
        return $this->morphTo();
    }
}
