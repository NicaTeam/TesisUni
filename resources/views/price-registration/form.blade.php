



    <div class="form-group {{ $errors->has('validPeriod') ? 'has-error' : ''}}">
        <label for="validPeriod" class="col-md-4 control-label">{{ 'Nombre de la lista y su periodo' }}</label>
        <div class="col-md-6">
            <input class="form-control" v-model="validPeriod" name="validPeriod" type="text" id="validPeriod" value="{{ $priceregistration->ValidPeriod or ''}}" >
            {!! $errors->first('ValidPeriod', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


<div class="row">

    <div class="panel panel-primary">

        <div class="panel-body">


                <div class="form-group {{ $errors->has('cigar_id') ? 'has-error' : ''}}">
                <label for="cigar_id" class="col-md-4 control-label">{{ 'Marca y presentacion de puro' }}</label>


                
                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                            
                            <select v-model="cigar_id"  name="cigar_id" id="cigar_id" class="form-control selectpicker" data-live-search="true">

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

                            <select v-model="customer_type_id" name="customer_type_id" id="customer_type_id" class="form-control">

                                @foreach($customerTypes as $type)

                                    <option value="{{ $type->id }}">{{ $type->clienteTipo }}</option>

                                @endforeach



                            </select>

                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                        <label for="price" class="col-md-4 control-label">{{ 'Precio' }}</label>
                        <div class="col-md-6">
                            <input class="form-control" name="price" type="number" id="price" v-model="price" value="{{ ''}}" >
                            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div>

                  

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">

                            <!-- <button class="btn btn-primary" type="button" v-on:click="agregrarProd" id="bt_add" value="Agregar"></button> -->

                            <input class="btn btn-primary" type="button" v-on:click="agregrarProd" id="bt_add" value="Agregar">


                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                        <table id="detail" class="table table-striped table-bordered table-condensed table-hover">

                            <thead style="background-color:#A9D0F5">

                                <th>Opciones</th>
                                <th>Marca de puro</th>
                                <th>Tipo de distribuidor</th>
                                <th>Precio</th>



                            </thead>

                             <tr class="selected"  v-for="item in ProdDist">
                                <td><button type="button" class="btn btn-warning" v-on:click="removeRow(item)">x</button></td>
                                <td> <input type="hidden"  type="number" name="cigar_id[]" v-bind:value="item[2]"> @{{ item[3][0] }}</td>
                                <td> <input type="hidden" type="number" name="customer_type_id[]" v-bind:value="item[0]">@{{ item[1][0] }}</td>
                                <td> <input  name="price[]" v-bind:value="item[4]"></td>

                            </tr>

                            {{--<tfoot>--}}

                                {{--<th>Total</th>--}}
                                {{--<th>Marca de puro</th>--}}
                                {{--<th>Precio</th>--}}
                                {{--<th>Activo</th>--}}
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


        <div class="col-md-8 col-md-offset-4 " id="guardar">

            <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
        </div>
    </div>



</div>
