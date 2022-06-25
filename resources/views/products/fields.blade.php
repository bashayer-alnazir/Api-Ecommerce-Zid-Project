<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Price', 'Price:') !!}
    {!! Form::number('Price', null, ['class' => 'form-control']) !!}
</div>

<!-- Vat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Vat', 'Vat:') !!}
    {!! Form::number('Vat', null, ['class' => 'form-control']) !!}
</div>

<!-- Istaxable Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('IsTaxable', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('IsTaxable', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('IsTaxable', 'Istaxable', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Merchantid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MerchantId', 'Merchantid:') !!}
    {!! Form::number('MerchantId', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::text('created_at', null, ['class' => 'form-control','id'=>'created_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#created_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::text('updated_at', null, ['class' => 'form-control','id'=>'updated_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#updated_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Deleted At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    {!! Form::text('deleted_at', null, ['class' => 'form-control','id'=>'deleted_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#deleted_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush