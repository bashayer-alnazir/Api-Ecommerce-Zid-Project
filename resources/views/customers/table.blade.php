<div class="table-responsive">
    <table class="table" id="customers-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
        <th>Email Verified At</th>
        <th>Password</th>
        <th>Ismerchants</th>
        <th>Remember Token</th>
        <th>Created At</th>
        <th>Updated At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customers)
            <tr>
                <td>{{ $customers->name }}</td>
            <td>{{ $customers->email }}</td>
            <td>{{ $customers->email_verified_at }}</td>
            <td>{{ $customers->password }}</td>
            <td>{{ $customers->IsMerchants }}</td>
            <td>{{ $customers->remember_token }}</td>
            <td>{{ $customers->created_at }}</td>
            <td>{{ $customers->updated_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['customers.destroy', $customers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customers.show', [$customers->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('customers.edit', [$customers->id]) }}"
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
