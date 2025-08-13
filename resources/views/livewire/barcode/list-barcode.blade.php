<div>
    <div class="table-responsive">
        @include('components.search-and-limit')
        <table class="table text-nowrap table-hover">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Product</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barcodes as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->product?->name }}</td>
                        <td>
                            @php
                                $actions = [];
                                $actions[] = ['url' => route('barcodes.edit', $item->id), 'name' => trans('global.update')];
                                $actions[] = ['url' => '#', 'name' => trans('global.delete'), 'function' => 'delete', 'id' => $item->id];
                            @endphp
                            @include('components.action-dropdown', compact('actions'))
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $barcodes->links() }}
    </div>
</div>