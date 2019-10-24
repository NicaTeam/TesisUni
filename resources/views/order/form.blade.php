<order :companies="{{ $companies }}" :cigars="{{ $cigars }}" :prices="{{ $prices }}" id="orderComponent" inline-template>

    <div>

        <div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
            <!-- <label for="company_id" class="col-md-4 control-label">{{ 'Company Id' }}</label> -->
            <div class="col-md-6">
                <!-- <input class="form-control" name="company_id" type="number" id="company_id" value="{{ $order->company_id or ''}}" > -->

                    <div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
                        <label for="company_id" class="col-md-4 control-label">{{ 'Cliente' }}</label>


                        
                            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    
                                    <select v-on:change="buscarCompany" v-model="company_id" name="company_id" id="company_id" class="form-control selectpicker" data-live-search="true">

                                        @foreach($companies as $item)

                                                    <option value="{{ $item->id }}">{{ $item->name.' | Country: '. $item->country->name }}</option>

                                        @endforeach
                                    </select>
                           
                            </div>
                        </div>


                {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

       <div class="form-group {{ $errors->has('reference') ? 'has-error' : ''}}">
            <label for="reference" class="col-md-4 control-label">{{ 'Referencia de orden' }}</label>
            
            <div class="col-md-6">

                <input  class="form-control" name="reference" type="text" id="reference" required>
                {!! $errors->first('reference', '<p class="help-block">:message</p>') !!}

            </div>
        </div>

        <div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
            <label for="company_name" class="col-md-4 control-label">{{ 'Nombre Cliente' }}</label>
            
            <div class="col-md-6">

                <input v-for="Cliente in selectedCliente" class="form-control redondeado confondo" name="company_name" type="text" id="company_name" v-bind:value="Cliente.name" v-on:keyup.prevent="searchAgent(Cliente.id)">
                {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}

            </div>
        </div>

        <hr>

        <div class="form-group {{ $errors->has('company_shipping_addres') ? 'has-error' : ''}}">
            <label for="company_shipping_addres" class="col-md-4 control-label">{{ 'Cliente dirección de envío' }}</label>

            <div class="col-md-6">
                <input v-for="Cliente in selectedCliente" class="form-control redondeado confondo" name="company_shipping_addres" type="text" id="company_shipping_addres" v-bind:value="Cliente.shippingAddress" >
                {!! $errors->first('company_shipping_addres', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <hr>

        <div class="form-group {{ $errors->has('company_contact_name') ? 'has-error' : ''}}">
            <label for="company_contact_name" class="col-md-4 control-label">{{ 'Contacto de cliente' }}</label>
            <div v-for="persons in selectedCliente" class="col-md-6">

                <div v-if="persons.persons.length">

                    <input  v-for="person in persons.persons" class="form-control redondeado confondo" name="company_contact_name" type="text" id="company_contact_name" v-bind:value="person.name + ' ' + person.lastName" >

                </div>

                <div v-else>

                    <input class="form-control confondoAmarillo" name="company_contact_name" type="text" id="company_contact_name" value="-" v-model="noValue">

                </div>
                {!! $errors->first('company_contact_name', '<p class="help-block">:message</p>') !!}

            </div>
        </div>

        <div class="form-group {{ $errors->has('company_contact_email') ? 'has-error' : ''}}">
            <label for="company_contact_email" class="col-md-4 control-label">{{ 'Email del contacto del cliente' }}</label>
            <div v-for="persons in selectedCliente" class="col-md-6">

                <div v-if="persons.persons.length">

                    <input v-for="person in persons.persons" class="form-control redondeado confondo" name="company_contact_email" type="text" id="company_contact_email" v-bind:value="person.email" >

                </div>

                <div v-else>

                    <input  class="form-control confondoAmarillo" name="company_contact_email" type="text" id="company_contact_email" value="-" v-model="noValue">
                    
                </div>
                {!! $errors->first('company_contact_email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>


        <div class="form-group {{ $errors->has('company_contact_telephone') ? 'has-error' : ''}}">
            <label for="company_contact_telephone" class="col-md-4 control-label">{{ 'Teléfono del contacto del cliente' }}</label>
            <div v-for="persons in selectedCliente" class="col-md-6">

                <div v-if="persons.persons.length">

                    <input v-for="person in persons.persons" class="form-control redondeado confondo" name="company_contact_telephone" type="text" id="company_contact_telephone" v-bind:value="person.telephone" >

                </div>

                <div v-else>

                     <input class="form-control confondoAmarillo" name="company_contact_telephone" type="text" id="company_contact_telephone" value="-" v-model="noValue" >
                    

                </div>
                {!! $errors->first('company_contact_telephone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <hr>


        <div class="form-group {{ $errors->has('payment_term_name') ? 'has-error' : ''}}">
            <label for="payment_term_name" class="col-md-4 control-label">{{ 'Término de pago' }}</label>
            <div v-for="payment_term in selectedCliente" class="col-md-6">


                <div>

                    <div v-if="payment_term.payment_term">


                        <input class="form-control redondeado confondo" type="text" name="payment_term_name" v-bind:value="payment_term.payment_term.name">

                       
                    </div>

                    <div v-else>

                        <input class="form-control confondoAmarillo" type="text" name="payment_term_name" value="-" v-model="noValue">
                        
                    </div>


                </div>

                
                {!! $errors->first('payment_term_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('incoterm_name') ? 'has-error' : ''}}">
            <label for="incoterm_name" class="col-md-4 control-label">{{ 'Acuerdo comercial' }}</label>
            <div v-for="incoterm in selectedCliente" class="col-md-6">

                <div>

                    <div v-if="incoterm.incoterm">
                        <input class="form-control redondeado confondo" name="incoterm_name" type="text" id="incoterm_name" v-bind:value="incoterm.incoterm.name">

                    </div>

                    <div v-else>

                         <input class="form-control confondoAmarillo" name="incoterm_name" type="text" id="incoterm_name" value="-" v-model="noValue">
                        

                    </div>

                </div>
                {!! $errors->first('incoterm_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <hr>

        <div class="form-group {{ $errors->has('customs_agency_name') ? 'has-error' : ''}}">
            <label for="customs_agency_name" class="col-md-4 control-label">{{ 'Agente aduanero' }}</label>
            <div v-for="agents in selectedCliente" class="col-md-6">

                <div v-if="agents.agent.length">

                    <input v-for="agent in agents.agent" class="form-control redondeado confondo" name="customs_agency_name" type="text" id="customs_agency_name" v-bind:value="agent.name" >

                </div>

                <div v-else>

                    <input class="form-control confondoAmarillo" name="customs_agency_name" type="text" id="customs_agency_name" value="-" v-model="noValue" >
                </div>
                {!! $errors->first('customs_agency_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('customs_agency_shipping_address') ? 'has-error' : ''}}">
            <label for="customs_agency_shipping_address" class="col-md-4 control-label">{{ 'Dirección del agente aduanero' }}</label>
            <div v-for="agents in selectedCliente" class="col-md-6">

                <div v-if="agents.agent.length">

                    <input v-for="agent in agents.agent" class="form-control redondeado confondo" name="customs_agency_shipping_address" type="text" id="customs_agency_shipping_address" v-bind:value="agent.shippingAddress" >

                </div>

                <div v-else>

                    <input class="form-control confondoAmarillo" name="customs_agency_shipping_address" type="text" id="customs_agency_shipping_address" value="-" v-model="noValue" >

                </div>


                {!! $errors->first('customs_agency_shipping_address', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('customs_agency_contact_name') ? 'has-error' : ''}}">
            <label for="customs_agency_contact_name" class="col-md-4 control-label">{{ 'Nombre contacto agente aduanero' }}</label>
            <div v-for="agents in selectedCliente" class="col-md-6">

                <div v-if="agents.agent.length">

                    <input v-for="agent in agents.agent" class="form-control redondeado confondo" name="customs_agency_contact_name" type="text" id="customs_agency_contact_name" v-bind:value="agent.contact_name" >

                </div>

                <div v-else>
                    <input class="form-control confondoAmarillo" name="customs_agency_contact_name" type="text" id="customs_agency_contact_name" value="-" v-model="noValue" >

                </div>

                {!! $errors->first('customs_agency_contact_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('customs_agency_contact_email') ? 'has-error' : ''}}">
            <label for="customs_agency_contact_email" class="col-md-4 control-label">{{ 'Email del agente aduanero' }}</label>
            <div v-for="agents in selectedCliente"  class="col-md-6">

                <div v-if="agents.agent.length">

                    <input v-for="agent in agents.agent" class="form-control redondeado confondo" name="customs_agency_contact_email" type="text" id="customs_agency_contact_email" v-bind:value="agent.email" >

                </div>

                <div v-else>

                    <input class="form-control confondoAmarillo" name="customs_agency_contact_email" type="text" id="customs_agency_contact_email" value="-" v-model="noValue">

                </div>


                {!! $errors->first('customs_agency_contact_email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('customs_agency_contact_telephone') ? 'has-error' : ''}}">
            <label for="customs_agency_contact_telephone" class="col-md-4 control-label">{{ 'Teléfono contacto angente aduanero' }}</label>
            <div v-for="agents in selectedCliente" class="col-md-6">

                 <div v-if="agents.agent.length">

                    <input v-for="agent in agents.agent" class="form-control redondeado confondo" name="customs_agency_contact_telephone" type="text" id="customs_agency_contact_telephone" v-bind:value="agent.telephone" >

                </div>

                <div v-else>

                    <input class="form-control confondoAmarillo" name="customs_agency_contact_telephone" type="text" id="customs_agency_contact_telephone" value="-" v-model="noValue">

                </div>

                {!! $errors->first('customs_agency_contact_telephone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <hr>


        <div class="row">

            <div class="panel panel-primary">

                <div class="panel-body">


                        <div class="form-group {{ $errors->has('cigar_id') ? 'has-error' : ''}}">
                        <label for="cigar_id" class="col-md-4 control-label">{{ 'Marca y presentación de puro' }}</label>


                        
                            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    
                                    <select v-model="cigar_id"  name="cigar_id" id="cigar_id" class="form-control selectpicker" data-live-search="true" v-on:change.prevent="buscarPrecio">

                                        @foreach($cigars as $cigar)

                                            <option value="{{ $cigar->id }}">{{ $cigar->name.' | Unidad: '. $cigar->unitOfMeasurement->name. ' | Presentacion: '. $cigar->unitsInPresentation }}</option>

                                        @endforeach
                                    </select>


                           
                            </div>
                        </div>

                            <div class="form-group {{ $errors->has('brand_name') ? 'has-error' : ''}}">
                                <label for="brand_name" class="col-md-4 control-label">{{ 'Linea o Marca' }}</label>
                                <div v-for="brand_group in selectedProducto" class="col-md-6">


                                    <div>

                                        <div v-if="brand_group.brand_group">

                                                <input class="form-control redondeado" name="brand_name" type="text" id="brand_name" v-bind:value="brand_group.brand_group.name" readonly>

                                        </div>

                                        {!! $errors->first('brand_name', '<p class="help-block">:message</p>') !!}

                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('cigar_name') ? 'has-error' : ''}}">
                                <label for="cigar_name" class="col-md-4 control-label">{{ 'Nombre del puro' }}</label>
                                <div class="col-md-6">
                                    <input v-for="producto in selectedProducto" class="form-control redondeado" name="cigar_name" type="text" id="cigar_name" v-bind:value="producto.name" readonly>
                                    {!! $errors->first('cigar_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('cigar_size_name') ? 'has-error' : ''}}">
                                <label for="cigar_size_name" class="col-md-4 control-label">{{ 'Vitóla' }}</label>
                                <div v-for="cigar_size in selectedProducto" class="col-md-6">

                                    <div>

                                        <div v-if="cigar_size.cigar_size">

                                            <input class="form-control redondeado" name="cigar_size_name" type="text" id="cigar_size_name" v-bind:value="cigar_size.cigar_size.name" readonly>

                                        </div>


                                        {!! $errors->first('cigar_size_name', '<p class="help-block">:message</p>') !!}

                                    </div>
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('cigar_barcode') ? 'has-error' : ''}}">
                                <label for="cigar_barcode" class="col-md-4 control-label">{{ 'Código de barra' }}</label>
                                <div class="col-md-6">
                                    <input v-for="producto in selectedProducto" class="form-control redondeado" name="cigar_barcode" type="text" id="cigar_barcode" v-bind:value="producto.barcode" readonly>
                                    {!! $errors->first('cigar_barcode', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('cigar_unitOfMeasurement_name') ? 'has-error' : ''}}">
                                <label for="cigar_unitOfMeasurement_name" class="col-md-4 control-label">{{ 'Unidad de medida' }}</label>
                                <div v-for="unit_of_measurement in selectedProducto" class="col-md-6">

                                    <div>

                                        <div v-if="unit_of_measurement.unit_of_measurement">

                                            <input class="form-control redondeado" name="cigar_unitOfMeasurement_name" type="text" id="cigar_unitOfMeasurement_name" v-bind:value="unit_of_measurement.unit_of_measurement.name" readonly>

                                        </div>

                                    </div>

                                    {!! $errors->first('cigar_unitOfMeasurement_name', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('cigar_unitOfMeasurement_name') ? 'has-error' : ''}}">
                                <label for="cigar_unitsInPresentation" class="col-md-4 control-label">{{ 'Unidades en presentación' }}</label>
                                <div class="col-md-6">
                                    <input v-for="producto in selectedProducto" class="form-control redondeado" name="cigar_unitsInPresentation" type="text" id="cigar_unitsInPresentation" v-bind:value="producto.unitsInPresentation" readonly>
                                    {!! $errors->first('cigar_unitsInPresentation', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('cigar_netWeight') ? 'has-error' : ''}}">
                                <label for="cigar_netWeight" class="col-md-4 control-label">{{ 'Peso neto por puro' }}</label>
                                <div class="col-md-6">
                                    <input v-for="producto in selectedProducto" class="form-control redondeado" name="cigar_netWeight" type="number" id="cigar_netWeight" v-bind:value="producto.netWeight" readonly>
                                    {!! $errors->first('cigar_netWeight', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                                <label for="price" class="col-md-4 control-label">{{ 'Precio' }}</label>
                                <div class="col-md-6">
                                    <input v-for="p in price" class="form-control redondeado" name="price" type="number" id="price" v-bind:value="p.price" readonly>
                                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                                </div>

                            </div>

                            <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
                                <label for="quantity" class="col-md-4 control-label">{{ 'Cantidad' }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="quantity" type="number" id="quantity" v-model="quantity" >
                                    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
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
                                        <th>Id</th>
                                        <th>Código de barra</th>
                                        <th>Linea</th>
                                        <th>Nombre de puro</th>
                                        <th>Vitóla</th>
                                        <th>Peso neto</th>
                                        <th>Unidad medida</th>
                                        <th>Unidades</th>
                                        
                                        <th>Precio</th>

                                        <th>Cantidad</th>
                                        <th>Total puros</th>
                                        <th>Monto</th>

                                        



                                    </thead>

                                     <tr class="selected"  v-for="item in detail">
                                        <td><button type="button" class="btn btn-warning" v-on:click="removeRow(item)">x</button></td>
                                        <td> <input type="hidden"  type="number" name="cigar_id[]" v-bind:value="item[0]">@{{ item[0] }}</td>

                                        
                                        <td> <input type="hidden" type="number" name="cigar_barcode[]" v-bind:value="item[1]">@{{ item[1] }}</td>

                                        <td> <input type="hidden" type="number" name="brand_name[]" v-bind:value="item[2]">@{{ item[2] }}</td>

                                         <td> <input type="hidden" type="number" name="cigar_name[]" v-bind:value="item[3]">@{{ item[3] }}</td>

                                         <td> <input type="hidden" type="number" name="cigar_size_name[]" v-bind:value="item[4]">@{{ item[4] }}</td>

                                         <td> <input type="hidden" type="number" name="cigar_netWeight[]" v-bind:value="item[5]">@{{ item[5] }}</td>

                                         <td> <input type="hidden" type="number" name="cigar_unitOfMeasurement_name[]" v-bind:value="item[8]">@{{ item[8] }}</td>

                                         <td> <input type="hidden" type="number" name="cigar_unitsInPresentation[]" v-bind:value="item[9]">@{{ item[9] }}</td>

                                        <td> <input type="hidden" type="number" name="cigar_price[]" v-bind:value="item[6]">@{{ item[6] }}</td>

                                    
                                        <td> <input type="hidden" type="number"  name="quantity[]" v-bind:value="item[7]">@{{ item[7] }}</td>

                                         <td> <input type="hidden" type="number" name="subTotalCigars[]" v-bind:value="item[10]">@{{ item[10] }}</td>

                                          <td> <input type="hidden" type="number" name="subAmount[]" v-bind:value="item[11]">@{{ item[11] }}</td>

                                        

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

        </div>





        <div class="form-group {{ $errors->has('total_net_weight_in_grams') ? 'has-error' : ''}}">
            <label for="total_net_weight_in_grams" class="col-md-4 control-label">{{ 'Total peso neto en gramos' }}</label>
            <div class="col-md-6">
                <input class="form-control redondeado confondo" name="total_net_weight_in_grams" type="number" id="total_net_weight_in_grams" v-model="total_net_weight" step="0.01" readonly>
                {!! $errors->first('total_net_weight_in_grams', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('total_boxes') ? 'has-error' : ''}}">
            <label for="total_boxes" class="col-md-4 control-label">{{ 'Total cajas' }}</label>
            <div class="col-md-6">
                <input class="form-control redondeado confondo" name="total_boxes" type="number" id="total_boxes" v-model="total_boxes" readonly>
                {!! $errors->first('total_boxes', '<p class="help-block">:message</p>') !!}
            </div>
        </div>


        <div class="form-group {{ $errors->has('total_packs') ? 'has-error' : ''}}">
            <label for="total_packs" class="col-md-4 control-label">{{ 'Total paquetes' }}</label>
            <div class="col-md-6">
                <input class="form-control redondeado confondo" name="total_packs" type="number" id="total_packs" v-model="total_packs" readonly >
                {!! $errors->first('total_packs', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('total_cigars') ? 'has-error' : ''}}">
            <label for="total_cigars" class="col-md-4 control-label">{{ 'Total puros' }}</label>
            <div class="col-md-6">
                <input class="form-control redondeado confondo" name="total_cigars" type="number" id="total_cigars" v-model="total_cigars" readonly>
                {!! $errors->first('total_cigars', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('amount_order_total') ? 'has-error' : ''}}">
            <label for="amount_order_total" class="col-md-4 control-label">{{ 'Total orden' }}</label>
            <div class="col-md-6">
                <input class="form-control redondeado confondo" name="amount_order_total" type="number" id="amount_order_total" v-model="amount_order_total" readonly>
                {!! $errors->first('amount_order_total', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('shipping_quote') ? 'has-error' : ''}}">
            <label for="shipping_quote" class="col-md-4 control-label">{{ 'Cotización de flete' }}</label>
            <div class="col-md-6">
                <input class="form-control" name="shipping_quote" type="number" id="shipping_quote" v-model="shipping_quote">
                {!! $errors->first('amount_order_total', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('final_freight_cost') ? 'has-error' : ''}}">
            <label for="final_freight_cost" class="col-md-4 control-label">{{ 'Costo final de flete' }}</label>
            <div class="col-md-6">
                <input class="form-control" name="final_freight_cost" type="number" id="final_freight_cost" v-model="final_freight_cost">
                {!! $errors->first('amount_order_total', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('amount_due') ? 'has-error' : ''}}">
            <label for="amount_due" class="col-md-4 control-label">{{ 'Monto adeudado' }}</label>
            <div class="col-md-6">
                <input class="form-control redondeado confondo" name="amount_due" type="number" id="amount_due" v-model="amount_due" readonly>
                {!! $errors->first('amount_due', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('grand_total') ? 'has-error' : ''}}">
            <label for="grand_total" class="col-md-4 control-label">{{ 'Grand Total' }}</label>
            <div class="col-md-6">
                <input class="form-control redondeado confondo" name="grand_total" type="number" id="grand_total" v-model="grand_total" readonly>
                {!! $errors->first('grand_total', '<p class="help-block">:message</p>') !!}
            </div>
        </div>


        <!-- <div class="form-group {{ $errors->has('raw_order_file') ? 'has-error' : ''}}">
            <label for="raw_order_file" class="col-md-4 control-label">{{ 'Raw Order File' }}</label>
            <div class="col-md-6">
                <input class="form-control" name="raw_order_file" type="text" id="raw_order_file" value="{{ $order->raw_order_file or ''}}" >
                {!! $errors->first('raw_order_file', '<p class="help-block">:message</p>') !!}
            </div>
        </div> -->

        <div class="form-group {{ $errors->has('raw_order_file') ? 'has-error' : ''}}">
            <label for="raw_order_file" class="col-md-4 control-label">{{ 'Archivo' }}</label>
            <div class="col-md-6">
                
                <input class="form-control" name="raw_order_file" type="file" id="raw_order_file"  >
                {!! $errors->first('raw_order_file', '<p class="help-block">:message</p>') !!}

            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
                <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
            </div>
        </div>


       <!--  <div class="row">
            
            <div class="col-sm-7" >
                    
                    <h1>JSON</h1>

                    <pre>

                        @{{ $data }}
                          
                    </pre>
            </div>
        </div> -->

    </div>






</order>
