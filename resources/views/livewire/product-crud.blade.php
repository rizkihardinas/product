<div>
    <button wire:click="create" class="btn btn-primary">Add Product</button>

    @if($isOpen)
        <div>
            <input type="text" wire:model="name" placeholder="Name">
            <input type="number" wire:model="price" placeholder="Price">
            <textarea wire:model="description" placeholder="Description"></textarea>
            <button wire:click="store">Save</button>
            <button wire:click="closeModal">Cancel</button>
        </div>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>Name</th><th>Price</th><th>Description</th><th>Actions</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <button wire:click="edit({{ $product->id }})">Edit</button>
                    <button wire:click="delete({{ $product->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
