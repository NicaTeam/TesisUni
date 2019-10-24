<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name')}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('countries_id') ? 'has-error' : ''}}">

    <label for="countries_id" class="col-md-4 control-label">{{ 'País' }}</label>
    <div class="col-md-6">

        {{--{!! Form::label('brand_groups_id', 'Linea de Puros:') !!}--}}

        <select name = 'countries_id' class ="form-control" required>

            <option value="">Selecciona un país</option>
            @foreach($countries as $country)

                <option value="{{ $country->id }}">

                    {{ $country->name }}

                </option>

            @endforeach

        </select>



    </div>

</div>


<div class="form-group {{ $errors->has('payment_term_id') ? 'has-error' : ''}}">

    <label for="payment_term_id" class="col-md-4 control-label">{{ 'Término de pago' }}</label>
    <div class="col-md-6">

        {{--{!! Form::label('brand_groups_id', 'Linea de Puros:') !!}--}}

        <select name = 'payment_term_id' class ="form-control" required>

            <option value="">Seleccione término de pago</option>
            @foreach($paymentTerm as $Term)


                <option value="{{ $Term->id }}">

                    {{ $Term->name }}

                </option>

            @endforeach

        </select>

    </div>

</div>

<div class="form-group {{ $errors->has('incoterm_id') ? 'has-error' : ''}}">

    <label for="incoterm_id" class="col-md-4 control-label">{{ 'Acuerdo comercial' }}</label>
    <div class="col-md-6">

        

        <select name = 'incoterm_id' class ="form-control" required>

            <option value="">Seleccione acuerdo comercial</option>
            @foreach($incoterm as $acuerdo)


                <option value="{{ $acuerdo->id }}">

                    {{ $acuerdo->name }}

                </option>

            @endforeach

        </select>

    </div>

</div>

<div class="form-group {{ $errors->has('company_types_id') ? 'has-error' : ''}}">

    <label for="company_types_id" id="company_types_id" class="col-md-4 control-label">{{ 'Tipo de companía' }}</label>
    <div class="col-md-6">

        {!! Form::select('company_types_id', $company_types, null, ['id' =>'company_types_id', 'name'=> 'company_types_id', 'class' => 'form-control']) !!}


    </div>

</div>



<div class="form-group {{ $errors->has('customer_type_list') ? 'has-error' : ''}}">
   
    <label for="customer_type_id" class="col-md-4 control-label">{{ 'Tipo de distribuidor' }}</label>
    <div class="col-md-6">

        {!! Form::select('customer_type_id', $customer_types, null, [ 'id' => 'customer_type_id', 'class' => 'form-control', 'required']) !!}
    </div>
</div>


<div class="form-group {{ $errors->has('shippingAddress') ? 'has-error' : ''}}">
    <label for="shippingAddress" class="col-md-4 control-label">{{ 'Direccion de envío' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="shippingAddress" type="text" id="shippingAddress" value="{{ old('shippingAddress') or ''}}" required>
        {!! $errors->first('shippingAddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="col-md-4 control-label">{{ 'Teléfono' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ old('telephone') or ''}}" required>
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
    </div>
</div>

