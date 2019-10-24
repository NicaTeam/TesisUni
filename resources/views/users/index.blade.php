@extends('layouts.admin')

@section('content')
    <div  class="container">
        <div class="row">

            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de usuarios</div>
                    <div class="panel-body">
                        <a href="{{ url('/users/create') }}" class="btn btn-success btn-sm" title="Agregar un nuevo usuario">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregrar nuevo usuario
                        </a>

                        <form method="GET" action="{{ url('/users') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>

                         @foreach ($users as $item)

                            <!-- <tr> -->

                                <div class="panel panel-default">

                                    <div class="panel-heading">{{ $item->name }}</div>

                                    <div class="panel-body">

                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre</th>
                                                        <th>Correo</th>
                                                        <th>Compañía</th>
                                                        <th>Estado</th>
                                                        <th>Rol</th>
                                                        <!-- <th>Actions</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               
                                                    <tr>
                                                        <td>{{ $loop->iteration or $item->id }}</td>
                                                        <td>{{ $item->name }}</td><td>{{ $item->email }}</td>

                                                        @if($item->company)

                                                            <td>{{ $item->company->name }}</td>

                                                        @else

                                                            <td>TBD</td>


                                                        @endif

                                                        @if($item->active == 1)

                                                            <td>Activo</td>
                                                        @else

                                                            <td>Inactivo</td>

                                                        @endif

                                                        @if($item->roles->count() > 0)

                                                            
                                                            @foreach($item->roles as $role)
                                                                <td><a href="{{ route('roles.show', $role->id)}}">{{ $role->name }}</a></td>

                                                            @endforeach

                                                           
                                                        @else

                                                            <td>TBD</td>

                                                        @endif
                                                    
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                 
                                        </div>



                                    </div>

                                    <div class="panel-footer">

                                        <a href="{{ url('/users/' . $item->id) }}" title="View customerType">

                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>

                                        </a>

                                        <a href="{{ url('/users/' . $item->id . '/edit') }}" title="Edit user">

                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>

                                        </a>

                                        @if($item->active == 1)

                                            <form method="POST" action="{{ url('/users' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Deshabilitar</button>
                                            </form>

                                        @else

                                            <form method="POST" action="{{ url('/users' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-success btn-xs" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Habilitar</button>
                                            </form>


                                        @endif

                                    </div>
  
                                </div>
                                
                            <!-- </tr> -->

                        @endforeach

                        


                    </div>{{--panel-body--}}
                </div>{{--div-col-md-9--}}
            </div>{{--row--}}
        </div>

        <!-- <flash message="{{ session('flash') }}"></flash> -->

    </div><!-- /.blog-main -->




@endsection