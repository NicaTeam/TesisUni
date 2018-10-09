@extends('layouts.admin')

@section('content')


            {{--@include('admin.sidebar')--}}


               <div id="app" class="container">

                    <div class="row">

                        <div class="col-sm-4">

                            <h1>Vue Ajax axios</h1>

                            <ul class="list-group">

                                <li v-for="item in tasks" class="list-group-item">


                                    @{{ item.name }}

                                    
                                    
                                </li>
                                
                            </ul>

                        </div>

                        <div class="col-sm-8">

                            <h1>JSON</h1>

                            <pre>
                                
                                @{{ $data }}
                            </pre>
                            

                        </div>
                        

                    </div>

                </div>

          

   



@endsection