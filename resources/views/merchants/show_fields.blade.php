<!-- Storename Field -->
<div class="col-sm-12">
    {!! Form::label('StoreName', 'Storename:') !!}
    <p>{{ $merchants->StoreName }}</p>
</div>

<!-- Shippingcost Field -->
<div class="col-sm-12">
    {!! Form::label('ShippingCost', 'Shippingcost:') !!}
    <p>{{ $merchants->ShippingCost }}</p>
</div>

<!-- Userid Field -->
<div class="col-sm-12">
    {!! Form::label('userId', 'Userid:') !!}
    <p>{{ $merchants->userId }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $merchants->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $merchants->updated_at }}</p>
</div>

<!-- Deleted At Field -->
<div class="col-sm-12">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $merchants->deleted_at }}</p>
</div>

