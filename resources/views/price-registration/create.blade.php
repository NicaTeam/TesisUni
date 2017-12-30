@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New PriceRegistration</div>
                    <div class="panel-body">
                        <a href="{{ url('/price-registration') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @cannot('Register_Prices')

                            <label class="col-md-12 control-label">No tiene suficientes permisos para ver el contenido de este formulario! Favor usar las credenciales correctas.</label>
                        @endcannot

                        @can('Register_Prices')

                            <form method="POST" action="{{ url('/price-registration') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include ('price-registration.form')

                            </form>

                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')

    <script >

        $(document).ready(function(){

            $('#bt_add').click(function(){

                agregar();
            });
        });

        var cont=0;

        $("#guardar").hide();

        function agregar() {

            cigar_id = $("#pcigar_id").val();
            cigar = $("#pcigar_id option:selected").text();
            customer_type_id = $("#pcustomer_type_id").val();
            price = $("#pprice").val();


            if (cigar_id !=" " && customer_type_id !=" " && price !=" "){

                var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">x</button></td><td> <input type="hidden"  type="number" name="cigar_id[]" value="'+cigar_id+'">'+cigar+'</td><td> <input type="number" name="customer_type_id[]" value="'+customer_type_id+'"></td><td> <input  name="price[]" value="'+price+'"></td></tr>';
                cont++;

                limpiar();
                evaluar();
                $('#detail').append(fila);
            }else{

                alert("Error al ingresar el detalle del precio del item, revise los datos");
            }
        }

        total=0;
        function limpiar() {
            $("#pprice").val("");

        }

        function evaluar(){

            if(cont>=0){
                $("#guardar").show();
            }
            else{
                $("#guardar").hide();
            }
        }

        function eliminar(index){

            $("#fila" + index).remove();
            evaluar();

        }


    </script>

    @endpush
@endsection
