<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $company->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('countries_id') ? 'has-error' : ''}}">
    <label for="countries_id" class="col-md-4 control-label">{{ 'País' }}</label>
    <div class="col-md-6">
        {{--<input class="form-control" name="countries_id" type="number" id="countries_id" value="{{ $company->countries_id or ''}}" >--}}


        {!! $errors->first('countries_id', '<p class="help-block">:message</p>') !!}
        {!! Form::select('countries_id', $countries, $selectedCountry, ['class' =>'form-control', 'required']) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('company_types_id') ? 'has-error' : ''}}">
    <label for="company_types_id" class="col-md-4 control-label">{{ 'Tipo de companía' }}</label>
    <div class="col-md-6">
        {{--<input class="form-control" name="company_types_id" type="number" id="company_types_id" value="{{ $company->company_types_id or ''}}" >--}}


        {!! $errors->first('company_types_id', '<p class="help-block">:message</p>') !!}
        {!! Form::select('company_types_id', $company_type, $selectedCompanyType, ['class' => 'form-control', 'required']) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('customer_types_list') ? 'has-error' : ''}}">
    <label for="customer_type_id" class="col-md-4 control-label">{{ 'Tipo de distribuidor' }}</label>
    <div class="col-md-6">
       
        {!! Form::select('customer_type_id', $customer_type, $selectedCustomerType, [ 'id' => 'customer_type_id', 'class' => 'form-control', 'required']) !!}
        {!! $errors->first('customer_types_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('payment_term_id') ? 'has-error' : ''}}">
    <label for="payment_term_id" class="col-md-4 control-label">{{ 'Término de pago' }}</label>
    <div class="col-md-6">
        {{--<input class="form-control" name="company_types_id" type="number" id="company_types_id" value="{{ $company->company_types_id or ''}}" >--}}
        {{--{!! $errors->first('company_types_id', '<p class="help-block">:message</p>') !!}--}}
        {{----}}
        {!! Form::select('payment_term_id', $payment_term, $selectedPaymentTerm, ['class' => 'form-control', 'required']) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('incoterm_id') ? 'has-error' : ''}}">
    <label for="incoterm_id" class="col-md-4 control-label">{{ 'Acuerdo comercial' }}</label>
    <div class="col-md-6">
        
        {!! Form::select('incoterm_id', $incoterm, $selectedIncoterm, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('incoterm_id', '<p class="help-block">:message</p>') !!}
        
    </div>
</div>



<div class="form-group {{ $errors->has('shippingAddress') ? 'has-error' : ''}}">
    <label for="shippingAddress" class="col-md-4 control-label">{{ 'Direccion de envío' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="shippingAddress" type="text" id="shippingAddress" value="{{ $company->shippingAddress or ''}}" required>
        {!! $errors->first('shippingAddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="col-md-4 control-label">{{ 'Teléfono' }}</label>
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
