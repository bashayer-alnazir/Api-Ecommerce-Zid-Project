<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
        <tr>
            <th>Price</th>
        <th>Vat</th>
        <th>Is Include Vat?</th>
        <th>Store Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->Price }}</td>
            <td>{{ $product->Vat }}</td>
            <td>{{ $product->Is_Include_Vat }}</td>
            <td>{{ $product->merchantid->StoreName }}</td>
            <td>{{ $product->created_at }}</td>
            <td>{{ $product->updated_at }}</td>
            <td>{{ $product->deleted_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['products.destroy', $product->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', [$product->Id]) }}"
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
