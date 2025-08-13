<div class="card p-3">
    <h4>Barcode: {{ $barcode->code }}</h4>
    <p>Product: {{ $barcode->product?->name }}</p>
</div>