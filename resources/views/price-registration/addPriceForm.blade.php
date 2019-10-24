<addprice :prices="{{ $priceregistration->priceRegistrationDetails }}" inline-template>

    <div>

        <div class="form-group {{ $errors->has('price_registration_id') ? 'has-error' : ''}}">
            <label for="price_registration_id" class="col-md-4 control-label">{{ 'Registro' }}</label>
            <div class="col-md-6">
               

                {{--{!! Form::select('price_registration_id', $price_registration, null, [ 'class' => 'form-control', 'readonly' =>'true']) !!}--}}

                <select v-model="price_registration_id"  name="price_registration_id" id="price_registration_id" class="form-control">

                    @foreach($price_registration as $item)

                        <option value="{{ $item->id }}">{{ $item->validPeriod }}</option>

                    @endforeach
                </select>

            </div>
        </div>

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

           
                <select v-model="customer_type_id" name="customer_type_id" id="customer_type_id" class="form-control">

                    <option value="">Seleccione tipo distribuidor</option>

                    @foreach($customerTypes as $type)

                        <option value="{{ $type->id }}">{{ $type->clienteTipo }}</option>

                    @endforeach



                </select>

            </div>

        </div>

        <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
            <label for="price" class="col-md-4 control-label">{{ 'Precio' }}</label>
            <div class="col-md-6">
                <input class="form-control" name="price" type="number" id="price" v-model="price" step="0.01" v-on:keyup="createPrice">
                {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
            </div>

        </div>


        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">

                <div v-if="priceExist">

                    <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}" disabled>
                    

                </div>

                <div v-else>

                    <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
                    

                </div>
                
            </div>
        </div>

    </div>

</addprice>