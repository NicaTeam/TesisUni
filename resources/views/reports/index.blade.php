@extends('layouts.admin')

@section('content')
    <div  class="container">
        <div class="row">

            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Reportes estadisticos</div>
                    <div class="panel-body">

                        <div class="row">

                            <h2>Reporte comparativos de ventas por mes.</h2>

                            <graph :type="'bar'" :labels="{{ $revenue2017->keys() }}" :values="{{ $revenue2017->values() }}" :values2="{{ $revenue2016->values() }}" :label1="'Ventas_2017'" :label2="'Ventas_2016'"></graph>


                         </div>

                          <div class="row">

                            <h2>Reporte comparativos de ventas por mes.</h2>

                            <linegraph :type="'line'" :labels="{{ $revenue2017->keys() }}" :values="{{ $revenue2017->values() }}" :values2="{{ $revenue2016->values() }}" :label1="'Ventas_2017'" :label2="'Ventas_2016'"></linegraph>


                         </div>

                         <div class="row">

                            <h2>Reporte de ventas por cliente.</h2>

                            <piegraph :type="'pie'" :labels="{{ $customer2017->keys() }}" :values="{{ $customer2017->values() }}" :label1="'Ventas_2017'" :label2="'Ventas_2016'"></piegraph>


                         </div>


                         <div class="row">

                            <h2>Reporte de ventas por pais.</h2>

                            <piegraph :type="'polarArea'" :labels="{{ $countries2017->keys() }}" :values="{{ $countries2017->values() }}" :label1="'Ventas_2017'" :text="'Reporte de ventas por pais'"></piegraph>


                         </div>

                        <div class="row">

                            <h2>Reporte de ventas por linea.</h2>

                            <piegraph :type="'pie'" :labels="{{ $brands2017->keys() }}" :values="{{ $brands2017->values() }}" :label1="'Ventas_2017'" :text="'Reporte de ventas por linea'"></piegraph>


                         </div>
                       

                    </div>{{--panel-body--}}
                </div>{{--div-col-md-9--}}
            </div>{{--row--}}
        </div>

        <!-- <flash message="{{ session('flash') }}"></flash> -->

    </div><!-- /.blog-main -->




@endsection