{{--<div class="form-group {{ $errors->has('User_id') ? 'has-error' : ''}}">--}}
    {{--<label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="user_id" type="number" id="user_id" value="{{ $priceregistration->user_id or ''}}" >--}}
        {{--{!! $errors->first('User_id', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
<div class="row">

    <div class="form-group {{ $errors->has('validPeriod') ? 'has-error' : ''}}">
        <label for="validPeriod" class="col-md-4 control-label">{{ 'Periodo Valido' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="validPeriod" type="text" id="validPeriod" value="{{ $priceregistration->ValidPeriod or ''}}" >
            {!! $errors->first('ValidPeriod', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    {{--<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">--}}
        {{--<label for="active" class="col-md-4 control-label">{{ 'Registro Activo' }}</label>--}}
        {{--<div class="col-md-6">--}}
            {{--<input class="form-control" name="active"  id="active"   value="{{ $priceRegistrationActive }}" >--}}
            {{--{!! $errors->first('Active', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}

</div>






{{--<div class="form-group {{ $errors->has('price_registration_id') ? 'has-error' : ''}}">--}}
    {{--<label for="price_registration_id" class="col-md-4 control-label">{{ 'Price Registration Id' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="price_registration_id" type="number" id="price_registration_id" value="{{ ''}}" >--}}
        {{--{!! $errors->first('price_registration_id', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}

<div class="row">

    <div class="panel panel-primary">

        <div class="panel-body">

                <div class="form-group {{ $errors->has('cigar_id') ? 'has-error' : ''}}">
                    <label for="cigar_id" class="col-md-4 control-label">{{ 'Cigar' }}</label>
                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                        {{--<input class="form-control" name="cigar_id" type="number" id="cigar_id" value="{{ ''}}" >--}}
                        {{--{!! $errors->first('cigar_id', '<p class="help-block">:message</p>') !!}--}}


                        <select name="pcigar_id" id="pcigar_id" class="form-control selectpicker" data-live-search="true">

                            @foreach($cigars as $cigar)

                                <option value="{{ $cigar->id }}">{{ $cigar->name.' | Unidad: '. $cigar->unitOfMeasurement->name. ' | Presentacion: '. $cigar->unitsInPresentation }}</option>

                            @endforeach



                        </select>
                    </div>
                </div>


                    <div class="form-group {{ $errors->has('customer_type_id') ? 'has-error' : ''}}">
                        <label for="customer_type_id" class="col-md-4 control-label">{{ 'Tipo de distribuidor' }}</label>

                        <div class="col-md-6">

                            {{--<input class="form-control" name="customer_type_id" type="number" id="customer_type_id" value="{{ ''}}" >--}}
                            {{--{!! $errors->first('customer_type_id', '<p class="help-block">:message</p>') !!}--}}

                            <select name="pcustomer_type_id" id="pcustomer_type_id" class="form-control">

                                @foreach($customerTypes as $type)

                                    <option value="{{ $type->id }}">{{ $type->clienteTipo }}</option>

                                @endforeach



                            </select>

                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                        <label for="price" class="col-md-4 control-label">{{ 'Price' }}</label>
                        <div class="col-md-6">
                            <input class="form-control" name="pprice" type="number" id="pprice" value="{{ ''}}" >
                            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div>

                    {{--<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">--}}
                    {{--<label for="active" class="col-md-4 control-label">{{ 'Active' }}</label>--}}
                        {{--<div class="col-md-6">--}}
                        {{--<input class="form-control" name="pactive"  id="pactive"   value="{{ $detailActive }}" >--}}
                        {{--{!! $errors->first('active', '<p class="help-block">:message</p>') !!}--}}

                        {{--</div>--}}

                    {{--</div>--}}

                    <div class="form-group">
                        <div class="col-md-8">

                            <button class="btn btn-primary" type="button" id="bt_add">Agregar</button>

                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                        <table id="detail" class="table table-striped table-bordered table-condensed table-hover">

                            <thead style="background-color:#A9D0F5">

                                <th>Opciones</th>
                                <th>Cigar</th>
                                <th>Customer Type ID</th>
                                <th>Precio</th>



                            </thead>

                            {{--<tfoot>--}}

                                {{--<th>Total</th>--}}
                                {{--<th>Cigar</th>--}}
                                {{--<th>Precio</th>--}}
                                {{--<th>Active</th>--}}
                                {{--<th><h4 id = "total">S/. 0.00</h4></th>--}}
                            {{----}}
                            {{----}}
                            {{--</tfoot>--}}

                            <tbody>


                            </tbody>



                        </table>

                    </div>

        </div>{{--end-Panel-body--}}

    </div>{{--end-Panel--}}

    <div class="form-group">

        {{--<input name=_token" value="{{ csrf_token() }}" type="hidden"></input>--}}
        {{ csrf_field() }}
        <div class="col-md-offset-4 col-md-4" id="guardar">

            <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
        </div>
    </div>



</div>
