<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="col-md-4 control-label">{{ 'Order Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="order_id" type="number" id="order_id" value="{{ $detailorder->order_id or ''}}" >
        {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cigar_id') ? 'has-error' : ''}}">
    <label for="cigar_id" class="col-md-4 control-label">{{ 'Cigar Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cigar_id" type="number" id="cigar_id" value="{{ $detailorder->cigar_id or ''}}" >
        {!! $errors->first('cigar_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cigar_barcode') ? 'has-error' : ''}}">
    <label for="cigar_barcode" class="col-md-4 control-label">{{ 'Cigar Barcode' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cigar_barcode" type="text" id="cigar_barcode" value="{{ $detailorder->cigar_barcode or ''}}" >
        {!! $errors->first('cigar_barcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('brand_name') ? 'has-error' : ''}}">
    <label for="brand_name" class="col-md-4 control-label">{{ 'Brand Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="brand_name" type="text" id="brand_name" value="{{ $detailorder->brand_name or ''}}" >
        {!! $errors->first('brand_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cigar_name') ? 'has-error' : ''}}">
    <label for="cigar_name" class="col-md-4 control-label">{{ 'Cigar Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cigar_name" type="text" id="cigar_name" value="{{ $detailorder->cigar_name or ''}}" >
        {!! $errors->first('cigar_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cigar_size_name') ? 'has-error' : ''}}">
    <label for="cigar_size_name" class="col-md-4 control-label">{{ 'Cigar Size Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cigar_size_name" type="text" id="cigar_size_name" value="{{ $detailorder->cigar_size_name or ''}}" >
        {!! $errors->first('cigar_size_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cigar_netWeight') ? 'has-error' : ''}}">
    <label for="cigar_netWeight" class="col-md-4 control-label">{{ 'Cigar Netweight' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cigar_netWeight" type="number" id="cigar_netWeight" value="{{ $detailorder->cigar_netWeight or ''}}" >
        {!! $errors->first('cigar_netWeight', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="col-md-4 control-label">{{ 'Quantity' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ $detailorder->quantity or ''}}" >
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cigar_unitOfMeasurement_name') ? 'has-error' : ''}}">
    <label for="cigar_unitOfMeasurement_name" class="col-md-4 control-label">{{ 'Cigar Unitofmeasurement Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cigar_unitOfMeasurement_name" type="text" id="cigar_unitOfMeasurement_name" value="{{ $detailorder->cigar_unitOfMeasurement_name or ''}}" >
        {!! $errors->first('cigar_unitOfMeasurement_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('subTotalCigars') ? 'has-error' : ''}}">
    <label for="subTotalCigars" class="col-md-4 control-label">{{ 'Subtotalcigars' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="subTotalCigars" type="number" id="subTotalCigars" value="{{ $detailorder->subTotalCigars or ''}}" >
        {!! $errors->first('subTotalCigars', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cigar_price') ? 'has-error' : ''}}">
    <label for="cigar_price" class="col-md-4 control-label">{{ 'Cigar Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cigar_price" type="number" id="cigar_price" value="{{ $detailorder->cigar_price or ''}}" >
        {!! $errors->first('cigar_price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subAmount') ? 'has-error' : ''}}">
    <label for="subAmount" class="col-md-4 control-label">{{ 'Subamount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="subAmount" type="number" id="subAmount" value="{{ $detailorder->subAmount or ''}}" >
        {!! $errors->first('subAmount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
