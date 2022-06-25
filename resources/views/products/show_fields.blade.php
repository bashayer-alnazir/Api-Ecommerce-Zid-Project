<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('Price', 'Price:') !!}
    <p>{{ $product->Price }}</p>
</div>

<!-- Vat Field -->
<div class="col-sm-12">
    {!! Form::label('Vat', 'Vat:') !!}
    <p>{{ $product->Vat }}</p>
</div>

<!-- Istaxable Field -->
<div class="col-sm-12">
    {!! Form::label('IsTaxable', 'Istaxable:') !!}
    <p>{{ $product->IsTaxable }}</p>
</div>

<!-- Merchantid Field -->
<div class="col-sm-12">
    {!! Form::label('MerchantId', 'Merchantid:') !!}
    <p>{{ $product->MerchantId }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

<!-- Deleted At Field -->
<div class="col-sm-12">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $product->deleted_at }}</p>
</div>

