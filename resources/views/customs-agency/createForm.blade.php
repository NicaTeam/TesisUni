<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">

    <label for="company_id" class="col-md-4 control-label">{{ 'Cliente' }}</label>
    <div class="col-md-6">

        {{--{!! Form::select('company_id', array_merge([''=>'Seleccione un cliente'],$companyCliente->toArray()), null, array('class' => 'form-control',  'required')) !!}--}}


        <select id="company_id" class="form-control" name="company_id" required>
            
            <option value="">Seleccione un cliente.</option>

            @foreach($companyCliente as $cliente)

                <option value="{{ $cliente->id }}">{{ $cliente->name}}</option>



            @endforeach
        </select>


        <!-- 'readonly' =>'true', -->


    </div>

</div>



<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('countries_id') ? 'has-error' : ''}}">

    <label for="countries_id" class="col-md-4 control-label">{{ 'Pais' }}</label>
    <div class="col-md-6">

        <select name = 'countries_id' class ="form-control" required>

            <option value="">Seleccione un pais.</option>
            @foreach($countries as $country)


                <option value="{{ $country->id }}">

                    {{ $country->name }}

                </option>

            @endforeach

        </select>
        {!! $errors->first('countries_id', '<p class="help-block">:message</p>') !!}

    </div>

</div>

<div class="form-group {{ $errors->has('company_types_id') ? 'has-error' : ''}}">

    <label for="company_types_id" class="col-md-4 control-label">{{ 'Tipo de compania' }}</label>
    <div class="col-md-6">

        {!! Form::select('company_types_id', $company_types, null, [ 'class' => 'form-control', 'readonly' =>'true']) !!}

    </div>

</div>


<div class="form-group {{ $errors->has('shippingAddress') ? 'has-error' : ''}}">
    <label for="shippingAddress" class="col-md-4 control-label">{{ 'Direccion de Envio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="shippingAddress" type="text" id="shippingAddress" value="{{ ''}}" required>
        {!! $errors->first('shippingAddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="col-md-4 control-label">{{ 'Telefono' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ ''}}" required>
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
    </div>
</div>
