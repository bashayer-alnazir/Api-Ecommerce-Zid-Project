<div class="table-responsive">
    <table class="table" id="merchants-table">
        <thead>
        <tr>
            <th>Store name</th>
        <th>Shipping cost</th>
        <th>User Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($merchants as $merchants)
            <tr>
                <td>{{ $merchants->StoreName }}</td>
            <td>{{ $merchants->ShippingCost }}</td>
            <td>{{ $merchants->userid->name }}</td>
            <td>{{ $merchants->created_at }}</td>
            <td>{{ $merchants->updated_at }}</td>
            <td>{{ $merchants->deleted_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['merchants.destroy', $merchants->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('merchants.show', [$merchants->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('merchants.edit', [$merchants->Id]) }}"
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
