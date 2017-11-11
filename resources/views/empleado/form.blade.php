<div class="form-group {{ $errors->has('Nombre') ? 'has-error' : ''}}">
    <label for="Nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="Nombre" type="text" id="Nombre" value="{{ $empleado->Nombre or ''}}" >
        {!! $errors->first('Nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Apellido') ? 'has-error' : ''}}">
    <label for="Apellido" class="col-md-4 control-label">{{ 'Apellido' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="Apellido" type="text" id="Apellido" value="{{ $empleado->Apellido or ''}}" >
        {!! $errors->first('Apellido', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $empleado->email or ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('phone_Number') ? 'has-error' : ''}}">
    <label for="phone_Number" class="col-md-4 control-label">{{ 'Phone Number' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="phone_Number" type="text" id="phone_Number" value="{{ $empleado->phone_Number or ''}}" >
        {!! $errors->first('phone_Number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
