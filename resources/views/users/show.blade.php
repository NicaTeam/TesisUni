@extends('layouts.admin')

@section('content')
    <div  class="container">
        <div class="row">

            <div class="col-sm-7">

                <!-- <a href="{{ url('/users') }}" title="View customerType"> -->

                <a href="{{ route('users.index') }}" title="View customerType">

                    <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>Atrás</button>

                </a>
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }}</div>
                    <div class="panel-body">
                        

                        <br/>
                        <br/>

                            <!-- <tr> -->

                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Company</th>
                                                        <th>Estado</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->name }}</td><td>{{ $user->email }}</td>

                                                        @if($user->company)

                                                            <td>{{ $user->company->name }}</td>

                                                        @else

                                                            <td>TBD</td>


                                                        @endif

                                                        @if($user->active == 1)

                                                            <td>Activo</td>
                                                        @else

                                                            <td>Inactivo</td>

                                                        @endif

                                                        <td>

                                                            

                                                            <a href="{{ url('/users/' . $user->id . '/edit') }}" title="Edit user">

                                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>

                                                            </a>

                                                            @if($user->active == 1)

                                                                <form method="POST" action="{{ url('/users' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}

                                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Deshabilitar</button>
                                                                </form>

                                                            @else

                                                                <form method="POST" action="{{ url('/users' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}

                                                                    <button type="submit" class="btn btn-success btn-xs" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Habilitar</button>
                                                                </form>


                                                            @endif

                                                        </td>


                                                    
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                 
                                        </div>
  
                                </div>
                                
                            <!-- </tr> -->

                        


                    </div>{{--panel-body--}}
                </div>{{--div-col-md-9--}}
            </div>{{--row--}}
        </div>

        <!-- <flash message="{{ session('flash') }}"></flash> -->

    </div><!-- /.blog-main -->




@endsection