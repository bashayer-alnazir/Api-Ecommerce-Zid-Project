<div class="table-responsive">
    <table class="table" id="productTranslations-table">
        <thead>
        <tr>
            <th>Productid</th>
        <th>Name</th>
        <th>Description</th>
        <th>Language</th>
        <th>Deleted At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productTranslations as $productTranslation)
            <tr>
                <td>{{ $productTranslation->ProductId }}</td>
            <td>{{ $productTranslation->Name }}</td>
            <td>{{ $productTranslation->Description }}</td>
            <td>{{ $productTranslation->Language }}</td>
            <td>{{ $productTranslation->deleted_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['productTranslations.destroy', $productTranslation->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productTranslations.show', [$productTranslation->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('productTranslations.edit', [$productTranslation->Id]) }}"
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
