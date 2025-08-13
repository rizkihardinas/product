<div class="row">
    <div class="col-12 mb-3">
        <select wire:model="productable_id" class="form-select">
            <option value="">-- select product --</option>
            @foreach($products as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 mb-3">
        <input wire:model.defer="barcode" class="form-control" placeholder="Barcode code">
    </div>
    <div class="col-12">
        <button wire:click="save" class="btn btn-primary">Save</button>
    </div>
</div>