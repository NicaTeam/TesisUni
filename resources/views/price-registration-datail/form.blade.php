<div class="form-group {{ $errors->has('price_registration_id') ? 'has-error' : ''}}">
    <label for="price_registration_id" class="col-md-4 control-label">{{ 'Price Registration Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="price_registration_id" type="number" id="price_registration_id" value="{{ $priceregistrationdatail->price_registration_id or ''}}" >
        {!! $errors->first('price_registration_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cigar_id') ? 'has-error' : ''}}">
    <label for="cigar_id" class="col-md-4 control-label">{{ 'Cigar Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cigar_id" type="number" id="cigar_id" value="{{ $priceregistrationdatail->cigar_id or ''}}" >
        {!! $errors->first('cigar_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('customer_type_id') ? 'has-error' : ''}}">
    <label for="customer_type_id" class="col-md-4 control-label">{{ 'Customer Type Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="customer_type_id" type="number" id="customer_type_id" value="{{ $priceregistrationdatail->customer_type_id or ''}}" >
        {!! $errors->first('customer_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="col-md-4 control-label">{{ 'Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="price" type="number" id="price" value="{{ $priceregistrationdatail->price or ''}}" >
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="col-md-4 control-label">{{ 'Active' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="active" type="number" id="active" value="{{ $priceregistrationdatail->active or ''}}" >
        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
