<div class="row">
    @include('components.forms.floating-text', ['label' => 'Name', 'name' => 'name'])
</div>
<div class="row">
    @include('components.forms.floating-text', ['label' => 'Price', 'name' => 'price', 'type' => 'number'])
</div>
<div class="row">
    <div class="col-12 mb-3">
        <textarea wire:model.defer="description" class="form-control" placeholder="Description"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button wire:click="save" class="btn btn-primary">Save</button>
    </div>
</div>