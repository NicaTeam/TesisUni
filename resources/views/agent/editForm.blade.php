
<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    <label for="company_id" class="col-md-4 control-label">{{ 'Cliente' }}</label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="company_id" type="number" id="company_id" value="{{ $agent->company_id or ''}}" > -->


        {!! Form::select('company_id', $companies, $selectedCompany, ['class' =>'form-control', 'required']) !!}
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $agent->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
    <label for="country_id" class="col-md-4 control-label">{{ 'País' }}</label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="country_id" type="number" id="country_id" value="{{ $agent->country_id or ''}}" > -->

        

        {!! Form::select('country_id', $countries, $selectedCountry, ['class' =>'form-control', 'required']) !!}
        {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('shippingAddress') ? 'has-error' : ''}}">
    <label for="shippingAddress" class="col-md-4 control-label">{{ 'Dirección' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="shippingAddress" type="text" id="shippingAddress" value="{{ $agent->shippingAddress or ''}}" >
        {!! $errors->first('shippingAddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="col-md-4 control-label">{{ 'Teléfono' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ $agent->telephone or ''}}" >
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $agent->email or ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact_name') ? 'has-error' : ''}}">
    <label for="contact_name" class="col-md-4 control-label">{{ 'Nombre de contacto' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="contact_name" type="text" id="contact_name" value="{{ $agent->contact_name or ''}}" >
        {!! $errors->first('contact_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Actualizar' }}">
    </div>
</div>