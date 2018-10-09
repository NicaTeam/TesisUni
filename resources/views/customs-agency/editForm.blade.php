<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $company->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('countries_id') ? 'has-error' : ''}}">
    <label for="countries_id" class="col-md-4 control-label">{{ 'Pais' }}</label>
    <div class="col-md-6">
        {{--<input class="form-control" name="countries_id" type="number" id="countries_id" value="{{ $company->countries_id or ''}}" >--}}


        {!! $errors->first('countries_id', '<p class="help-block">:message</p>') !!}
        {!! Form::select('countries_id', $countries, $selectedCountry, ['class' =>'form-control', 'required']) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('countries_id') ? 'has-error' : ''}}">
    <label for="customer_id" class="col-md-4 control-label">{{ 'Cliente' }}</label>
    <div class="col-md-6">
        {{--<input class="form-control" name="countries_id" type="number" id="countries_id" value="{{ $company->countries_id or ''}}" >--}}


        {!! $errors->first('countries_id', '<p class="help-block">:message</p>') !!}
        {!! Form::select('customer_id', $customers, $selectedCustomer, ['class' =>'form-control', 'required']) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('company_types_id') ? 'has-error' : ''}}">
    <label for="company_types_id" class="col-md-4 control-label">{{ 'Tipo de compania' }}</label>
    <div class="col-md-6">
        {{--<input class="form-control" name="company_types_id" type="number" id="company_types_id" value="{{ $company->company_types_id or ''}}" >--}}


        {!! $errors->first('company_types_id', '<p class="help-block">:message</p>') !!}
        {!! Form::select('company_types_id', $company_type, $selectedCompanyType, ['class' => 'form-control', 'required']) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('shippingAddress') ? 'has-error' : ''}}">
    <label for="shippingAddress" class="col-md-4 control-label">{{ 'Direccion de Envio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="shippingAddress" type="text" id="shippingAddress" value="{{ $company->shippingAddress or ''}}" required>
        {!! $errors->first('shippingAddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="col-md-4 control-label">{{ 'Telefono' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ $company->telephone or ''}}" required>
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
    </div>
</div>