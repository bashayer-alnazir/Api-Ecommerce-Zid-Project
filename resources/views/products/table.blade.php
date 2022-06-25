<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
        <tr>
            <th>Price</th>
        <th>Vat</th>
        <th>Istaxable</th>
        <th>Merchantid</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $products)
            <tr>
                <td>{{ $products->Price }}</td>
            <td>{{ $products->Vat }}</td>
            <td>{{ $products->IsTaxable }}</td>
            <td>{{ $products->MerchantId }}</td>
            <td>{{ $products->created_at }}</td>
            <td>{{ $products->updated_at }}</td>
            <td>{{ $products->deleted_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['products.destroy', $products->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$products->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', [$products->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
