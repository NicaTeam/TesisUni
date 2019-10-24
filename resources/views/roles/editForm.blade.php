<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <!-- <label for="name" class="col-md-4 control-label">Nombre</label> -->

    <!-- <div class="col-md-8"> -->
        <!-- <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}" required autofocus> -->

        {!! Form::label('name', 'Nombre')!!}

        {!! Form::text('name',null,array('class' => 'form-control', 'required' =>'required') )!!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    <!-- </div> -->
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <!-- <label for="slug" class="col-md-4 control-label">Slug</label> -->

    <!-- <div class="col-md-8"> -->
        <!-- <input id="slug" type="text" class="form-control" name="slug" value="{{ $role->slug }}" required> -->

        {!! Form::label('slug', 'Alias')!!}

        {!! Form::text('slug',null, array('class' => 'form-control', 'required' =>'required'))!!}

        @if ($errors->has('slug'))
            <span class="help-block">
                <strong>{{ $errors->first('slug') }}</strong>
            </span>
        @endif
    <!-- </div> -->
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <!-- <label for="description" class="col-md-4 control-label">Descripcion</label> -->

    <!-- <div class="col-md-8"> -->
        <!-- <input id="description" type="text" class="form-control" name="description" required> -->

        <!-- <textarea id="description" class="form-control" name="description" rows="4" required>{{ $role->description}}</textarea> -->

        {!! Form::label('description', 'Descripción')!!}

        {!! Form::textarea('description',null, array('class' => 'form-control', 'rows' =>'4', 'required' =>'required'))!!}

        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    <!-- </div> -->
</div>

<hr>

<h3>Lista de permisos</h3>

<hr>

<div class="form-group">

    <div class="col-md-11 col-md-offset-1">

        <ul class="list-unstyled">        
    
            @foreach($permissions as $permission)

                <li>
                    <label>
                        
                        {!! Form::checkbox('permissions[]', $permission->id, null) !!}

                        {{ $permission->name }}
                       <em>{{ $permission->description }}</em>
                        
                    </label>
                </li>

            @endforeach
 

        </ul>

    </div>

</div>

<!-- <div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div> -->

<!-- <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </div>
</div> -->





<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Actualizar' }}">
    </div>
</div>