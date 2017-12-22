@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">CustomsAgency {{ $customsAgency->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/customs-agency2/'.$customsAgency->id) }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>


                        <hr>
                        <div class = "comments">
                            <div class = "list-group">
                                {{--@foreach ($company->persons as $person)--}}
                                {{--<div class = "list-group-item">--}}
                                {{--<strong> {{ $person->name }}  {{$person->lastName}} | {{$person->email }} | {{ $person->telephone }} &nbsp; </strong>--}}
                                {{--{{ $comment->body }} {{ $comment->created_at->diffForHumans() }}--}}
                                {{--</div>--}}
                                {{--@endforeach--}}

                                <strong>Agregar otro contacto:</strong>
                            </div>
                        </div>
                        <hr>

                        <div class = "card">
                            <div class="card-block">
                                <form method="POST" action="/customs-agency2/{{ $customsAgency->id }}/persons" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{--<div class = "form-group">--}}
                                    {{--<textarea name ="body"  placeholder="Your comment here!" class ="form-control" required> </textarea>--}}
                                    {{--</div>--}}
                                    {{--<div class = "form-group">--}}
                                    {{--<button type="submit" class = "btn btn-primary">Add Comment</button>--}}
                                    {{--</div>--}}

                                    @include('customs-agency.form3')
                                </form>
                                @include('errors.list')
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection