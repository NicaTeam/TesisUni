@extends('Master')


@section('content')

    <div class="col-md-8">

        <h1>Sign in</h1>

        <form method="POST" action="/Login">


            {{ csrf_field() }}


            <div class="form-group">

                <label for="email">Email address:</label>

                <input type="email" class="form-control" id="email" name="email" required>


            </div>



            <div class="form-group">

                <label for="password">Password:</label>

                <input type="password" class="form-control" id="password" name="password" required>


            </div>


            <div class="form-group">



                <button  class="btn btn-primary" >Login</button>


            </div>

            @include('errors.list')


        </form>

    </div>

@endsection