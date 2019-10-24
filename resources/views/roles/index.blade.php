@extends('layouts.admin')

@section('content')
    <div  class="container">
        <div class="row">

            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de roles</div>
                    <div class="panel-body">
                        @can('roles.create')
                            <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm" title="Agregar un nuevo usuario">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregrar nuevo rol
                            </a>

                        @endcan

                        <form method="GET" action="{{ url('/roles') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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

                         @foreach ($roles as $item)

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
                                                        <th>Alias</th>
                                                        <th>Decripción</th>
                                                        <th>Permiso Especial</th>
                                                        
                                                        
                                                        <!-- <th>Actions</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               
                                                    <tr>
                                                        <td>{{ $loop->iteration or $item->id }}</td>
                                                        <td>{{ $item->name }}</td><td>{{ $item->slug }}</td>

                                                        @if($item->description)

                                                            <td>{{ $item->description }}</td>

                                                        @else

                                                            <td>TBD</td>


                                                        @endif

                                                        @if($item->special)

                                                            <td>{{ $item->special }}</td>
                                                        @else

                                                            <td>TBD</td>

                                                        @endif

                                                      
                                                    
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                 
                                        </div>



                                    </div>

                                    <div class="panel-footer">

                                        <a href="{{ url('/roles/' . $item->id) }}" title="Ver roles">

                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>

                                        </a>

                                        <a href="{{ url('/roles/' . $item->id . '/edit') }}" title="Edit role">

                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>

                                        </a>


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