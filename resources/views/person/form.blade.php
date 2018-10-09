<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $person->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
    <label for="lastName" class="col-md-4 control-label">{{ 'Apellido' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lastName" type="text" id="lastName" value="{{ $person->lastName or ''}}" >
        {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('titles_id') ? 'has-error' : ''}}">
    {{--<label for="titles_id" class="col-md-4 control-label">{{ 'Titulo' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="titles_id" type="number" id="titles_id" value="{{ $person->titles_id or ''}}" >--}}
        {{--{!! $errors->first('titles_id', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}

    <label for="titles_id" class="col-md-4 control-label">{{ 'Titulo' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('brandGroup', 'Linea de Puros:') !!}--}}
        {!! Form::select('titles_id', $titles, $selectedTitle, [ 'class' => 'form-control']) !!}

    </div>
</div>



<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="email" id="email" value="{{ $person->email or ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="col-md-4 control-label">{{ 'Telefono' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ $person->telephone or ''}}" >
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
    </div>
</div>