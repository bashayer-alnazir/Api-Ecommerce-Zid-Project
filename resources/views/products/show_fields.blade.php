<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('Price', 'Price:') !!}
    <p>{{ $products->Price }}</p>
</div>

<!-- Vat Field -->
<div class="col-sm-12">
    {!! Form::label('Vat', 'Vat:') !!}
    <p>{{ $products->Vat }}</p>
</div>

<!-- Istaxable Field -->
<div class="col-sm-12">
    {!! Form::label('IsTaxable', 'Istaxable:') !!}
    <p>{{ $products->IsTaxable }}</p>
</div>

<!-- Merchantid Field -->
<div class="col-sm-12">
    {!! Form::label('MerchantId', 'Merchantid:') !!}
    <p>{{ $products->MerchantId }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $products->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $products->updated_at }}</p>
</div>

<!-- Deleted At Field -->
<div class="col-sm-12">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $products->deleted_at }}</p>
</div>

