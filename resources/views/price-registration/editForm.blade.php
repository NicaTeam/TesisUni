{{--<div class="form-group {{ $errors->has('User_id') ? 'has-error' : ''}}">--}}
    {{--<label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="user_id" type="number" id="user_id" value="{{ $priceregistration->user_id or ''}}" >--}}
        {{--{!! $errors->first('User_id', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
<div class="row">

    <div class="form-group {{ $errors->has('validPeriod') ? 'has-error' : ''}}">
        <label for="validPeriod" class="col-md-4 control-label">{{ 'Nombre de la lista y su periodo' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="validPeriod" type="text" id="validPeriod" value="{{ $priceregistration->validPeriod }}" >
            {!! $errors->first('ValidPeriod', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    {{--<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">--}}
        {{--<label for="active" class="col-md-4 control-label">{{ 'Registro Activo' }}</label>--}}
        {{--<div class="col-md-6">--}}
            {{--<input class="form-control" name="active"  id="active"   value="{{ $priceRegistrationActive }}" >--}}
            {{--{!! $errors->first('Active', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}

</div>






{{--<div class="form-group {{ $errors->has('price_registration_id') ? 'has-error' : ''}}">--}}
    {{--<label for="price_registration_id" class="col-md-4 control-label">{{ 'Price Registration Id' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="price_registration_id" type="number" id="price_registration_id" value="{{ ''}}" >--}}
        {{--{!! $errors->first('price_registration_id', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}

<div class="row">


    <div class="form-group">

        {{--<input name=_token" value="{{ csrf_token() }}" type="hidden"></input>--}}
        {{ csrf_field() }}
        <div class="col-md-offset-4 col-md-4" id="guardar">

            <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
        </div>
    </div>



</div>
