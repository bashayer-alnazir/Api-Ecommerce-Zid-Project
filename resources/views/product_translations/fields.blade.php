<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ProductId', 'Productid:') !!}
    {!! Form::number('ProductId', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Language Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Language', 'Language:') !!}
    {!! Form::text('Language', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

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