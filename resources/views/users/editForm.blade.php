<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Nombre</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

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
        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    <label for="company_id" class="col-md-4 control-label">{{ 'Compañía' }}</label>
    <div class="col-md-6">

        {!! Form::select('company_id', $companies, $selectedCompany, ['class' =>'form-control']) !!}
    </div>
</div>


<div class="form-group">

    <label for="role_id" class="col-md-4 control-label">{{ 'Rol' }}</label>

    <div class="col-md-6">

        {!! Form::select('role_id', array_merge(['' => 'Favor seleccionar un role'], $roles), $selectedRole, ['class' => 'form-control']) !!}
        

    </div>
    

</div>







<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Actualizar' }}">
    </div>
</div>