<div>
    <div class="table-responsive">
        @include('components.search-and-limit')
        <table class="table text-nowrap table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="lh-1"> <span>{{ $item->name }}</span> </div>
                                    <div class="lh-1"> <span class="fs-11 text-muted">{{ \Illuminate\Support\Str::limit($item->description, 60) }}</span></div>
                                </div>
                            </div>
                        </td>
                        <td>{{ number_format($item->price,2) }}</td>
                        <td>
                            @php
                                $actions = [];
                                $actions[] = ['url' => route('products.edit', $item->id), 'name' => trans('global.update')];
                                $actions[] = ['url' => '#', 'name' => trans('global.delete'), 'function' => 'delete', 'id' => $item->id];
                            @endphp
                            @include('components.action-dropdown', compact('actions'))
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
</div>