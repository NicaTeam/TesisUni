@extends('layouts.admin')

@section('content')
    <div  class="container">
        <div class="row">
            <div class="col-sm-7">
                <a href="{{ route('roles.index') }}" class="btn btn-warning btn-sm" title="Atrás">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás
                </a>
                        
                <br/>
                <hr>

                <table class="table table-striped table-hover">

                    <tbody>

                        <tr>

                            <th>Id</th><td>{{ $role->id}}</td>

                        </tr>

                        <tr>
                            <th>Nombre</th><td>{{ $role->name }}</td>
                        </tr>

                        <tr>
                            <th>Alias</th><td>{{ $role->slug }}</td>
                        </tr>

                        <tr>
                            <th>Descripción</th><td>{{ $role->description ?: 'TBD' }}  </td>
                            
                        </tr>


                    </tbody>


                </table>

                <hr>

                <h3>Lista de permisos.</h3>
                <hr>



                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Alias</th>
                                <th>Decripción</th>

                                
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            @if($role->permissions->count() > 0)

                                @foreach ($role->permissions as $item)
                           
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->slug }}</td>

                                        @if($item->description)

                                            <td>{{ $item->description }}</td>

                                        @else

                                            <td>TBD</td>


                                        @endif
                                    
                                    </tr>

                                @endforeach

                            @else

                                <tr>Este role no tiene permisos todavía!</tr>


                            @endif
                        
                        </tbody>
                    </table>
         
                </div>
  
            </div>
        </div>



    </div>


@endsection