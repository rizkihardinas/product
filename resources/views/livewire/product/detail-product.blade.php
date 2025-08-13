<div class="card p-3">
    <h4>{{ $product->name }}</h4>
    <p>{{ $product->description }}</p>
    <p>Price: {{ number_format($product->price,2) }}</p>
    <h5>Barcodes</h5>
    <ul>
        @foreach($product->barcodes as $b)
            <li>{{ $b->code }}</li>
        @endforeach
    </ul>
</div>