<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Nombre</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Contraseña</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>

<!-- <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </div>
</div> -->


<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">

    <label for="company_id" class="col-md-4 control-label">{{ 'Compañia' }}</label>
    <div class="col-sm-6">

        

        <select  id="company_id" name ='company_id' class ="form-control" required>

            <option value=""> Selecciones una compañia</option>
            @foreach($companies as $company)


                <option value="{{ $company->id }}">

                    {{ $company->name }}

                </option>

            @endforeach

        </select>

    </div>

</div>

<div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">

    <label for="role_id" class="col-md-4 control-label">{{ 'Rol' }}</label>
    <div class="col-sm-6">

        

        <select  id="role_id" name ='role_id' class ="form-control" required>

            <option value="">Seleccione un role</option>
            @foreach($roles as $role)


                <option value="{{ $role->id }}">

                    {{ $role->name }}

                </option>

            @endforeach

        </select>

    </div>

</div>



<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
    </div>
</div>

