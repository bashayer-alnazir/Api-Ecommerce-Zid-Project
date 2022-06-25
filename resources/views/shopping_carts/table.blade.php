<div class="table-responsive">
    <table class="table" id="shoppingCarts-table">
        <thead>
        <tr>
            <th>Productid</th>
        <th>Userid</th>
        <th>Quantity</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shoppingCarts as $shoppingCart)
            <tr>
                <td>{{ $shoppingCart->ProductId }}</td>
            <td>{{ $shoppingCart->UserId }}</td>
            <td>{{ $shoppingCart->Quantity }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shoppingCarts.destroy', $shoppingCart->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shoppingCarts.show', [$shoppingCart->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shoppingCarts.edit', [$shoppingCart->Id]) }}"
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
