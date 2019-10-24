
<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <!-- <label for="order_id" class="col-md-4 control-label">{{ 'Orden' }}</label> -->
    <!-- <div class="col-md-6"> -->
        <!-- <input class="form-control" name="order_id" type="number" id="order_id" value="{{ $shipping->order_id or ''}}" readonly > -->

        {!! Form::label('order_id', 'Referencia de orden') !!}

        {!! Form::text('order_id', $shipping->order->reference, array('class' => 'form-control', 'required' => 'required', 'required' => 'required', 'readonly' => 'readonly')) !!}

        {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
    <!-- </div> -->
                        
                            
                        
</div>

<div class="form-group {{ $errors->has('invoiceNumbers') ? 'has-error' : ''}}">
    <!-- <label for="invoiceNumbers" class="col-md-4 control-label">{{ 'Números de facturas' }}</label> -->
    <!-- <div class="col-md-6"> -->
        <!-- <input class="form-control" name="invoiceNumbers" type="text" id="invoiceNumbers" value="{{ $shipping->invoiceNumbers or ''}}" required> -->

        {!! Form::label('invoiceNumbers', 'Numeros de facturas') !!}
        {!! Form::text('invoiceNumbers', null, array('class' => 'form-control', 'required' => 'required')) !!}
        {!! $errors->first('invoiceNumbers', '<p class="help-block">:message</p>') !!}
    <!-- </div> -->
</div>

<hr>

<!-- <div class="form-group {{ $errors->has('invoicesFiles') ? 'has-error' : ''}}">
    <label for="invoicesFiles" class="col-md-4 control-label">{{ 'Invoicesfiles' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="invoicesFiles" type="text" id="invoicesFiles" value="{{ $shipping->invoicesFiles or ''}}" >
        {!! $errors->first('invoicesFiles', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

 <div class="form-group {{ $errors->has('invoicesFiles') ? 'has-error' : ''}}">

    <label>Factura actual : </label><a href="{{ route('invoiceFileDownload', $shipping->id) }}"> {{ $shipping->invoicesFiles }}</a>
    <br>
    <!-- <label for="invoicesFiles" class="col-md-4 control-label">{{ 'Archivos de facturas' }}</label> -->
    <!-- <div class="col-md-6"> -->


        
        <!-- <input class="form-control" name="invoicesFiles" type="file" id="invoicesFiles"  > -->
        {!! Form::label('invoicesFiles', 'Archivo de facturas')!!}
        {!! Form::file('invoicesFiles', null, array('class' => 'form-control')) !!}
        {!! $errors->first('invoicesFiles', '<p class="help-block">:message</p>') !!}

    <!-- </div> -->
</div>

<hr>

<div class="form-group {{ $errors->has('packingListFiles') ? 'has-error' : ''}}">
    <label>Lista de embarque actual : </label><a href="{{ route('packingListFileDownload', $shipping->id) }}"> {{ $shipping->packingListFiles }}</a>
    
    <br>
    <!-- <label for="packingListFiles" class="col-md-4 control-label">{{ 'Archivos de lista de embarque' }}</label> -->
    <!-- <div class="col-md-6"> -->
        <!-- <input class="form-control" name="packingListFiles" type="file" id="packingListFiles" value="{{ $shipping->packingListFiles or ''}}" > -->

        {!! Form::label('packingListFiles', 'Lista de embarque')!!}
        {!! Form::file('packingListFiles', null, array('class' => 'form-control'))!!}
        {!! $errors->first('packingListFiles', '<p class="help-block">:message</p>') !!}
    <!-- </div> -->
</div>
<hr>

<div class="form-group {{ $errors->has('awbFiles') ? 'has-error' : ''}}">

    <label>Guia aérea actual :</label><a href="{{ route('awbFileDownload', $shipping->id)}}"> {{ $shipping->awbFiles }} </a>
    <br>
    <!-- <label for="awbFiles" class="col-md-4 control-label">{{ 'Guia aéreas' }}</label> -->
    <!-- <div class="col-md-6"> -->
        <!-- <input class="form-control" name="awbFiles" type="file" id="awbFiles" value="{{ $shipping->awbFiles or ''}}" > -->
        {!! Form::label('awbFiles', 'Guia aérea')!!}
        {!! Form::file('awbFiles', null,array('class' => 'form-control')) !!}
        {!! $errors->first('awbFiles', '<p class="help-block">:message</p>') !!}
    <!-- </div> -->
</div>

<hr>

<div class="form-group {{ $errors->has('sanitaryCertificateFiles') ? 'has-error' : ''}}">
    <label>Certificados actuales :</label><a href="{{ route('certificateFileDownload', $shipping->id) }}"> {{ $shipping->sanitaryCertificateFiles }}</a>

    <br>
    <!-- <label for="sanitaryCertificateFiles" class="col-md-4 control-label">{{ 'Certificado sanitario' }}</label> -->
    <!-- <div class="col-md-6"> -->
        <!-- <input class="form-control" name="sanitaryCertificateFiles" type="file" id="sanitaryCertificateFiles" value="{{ $shipping->sanitaryCertificateFiles or ''}}" > -->

        {!! Form::label('sanitaryCertificateFiles', 'Certificados') !!}
        {!! Form::file('sanitaryCertificateFiles', null, array('class' => 'form-control') )!!}
        {!! $errors->first('sanitaryCertificateFiles', '<p class="help-block">:message</p>') !!}
    <!-- </div> -->
</div>
<hr>

<div class="form-group {{ $errors->has('freight_type_name') ? 'has-error' : ''}}">
    <!-- <label for="freight_type_name" class="col-md-4 control-label">{{ 'Tipo de flete' }}</label> -->
    
    
    <!-- <div class="col-md-6"> -->
        <!-- <input class="form-control" name="freight_type_name" type="text" id="freight_type_name" value="{{ $shipping->freight_type_name or ''}}" > -->

       

        {!! Form::label('freight_type_name', 'Tipo de flete', array('class' => 'col-md-4 control-label'))!!}
        {!! Form::select('freight_type_name', $freightTypes, $selectedFreightType, array('class' => 'col-md-6 form-control') )!!}
        {!! $errors->first('freight_type_name', '<p class="help-block">:message</p>') !!}
    <!-- </div> -->
</div>
<br>

<div class="form-group {{ $errors->has('freight_provider_id') ? 'has-error' : ''}}">
    <!-- <label for="freight_provider_id" class="col-md-4 control-label">{{ 'Proveedor de flete' }}</label> -->
    
   
    <!-- <div class="col-md-6"> -->
        <!-- <input class="form-control" name="freight_provider_id" type="number" id="freight_provider_id" value="{{ $shipping->freight_provider_id or ''}}" > -->

        

        {!! Form::label('freight_provider_id', 'Proveedor de flete', array('class' => 'col-md-4 control-label')) !!}
        {!! Form::select('freight_provider_id', $freightProviders, $shipping->freight_provider_id, array('class' => 'col-md-6 form-control') )!!}
        {!! $errors->first('freight_provider_id', '<p class="help-block">:message</p>') !!}
    <!-- </div> -->
</div>

<!-- <div class="form-group {{ $errors->has('freight_provider_name') ? 'has-error' : ''}}">
    <label for="freight_provider_name" class="col-md-4 control-label">{{ 'Freight Provider Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="freight_provider_name" type="text" id="freight_provider_name" value="{{ $shipping->freight_provider_name or ''}}" >
        {!! $errors->first('freight_provider_name', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->


<div class="form-group {{ $errors->has('freight_cost') ? 'has-error' : ''}}">
    <label for="freight_cost" class="col-md-4 control-label">{{ 'Costo del flete' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="freight_cost" step="0.01" type="number" id="freight_cost" value="{{ $shipping->freight_cost or ''}}" >

        {!! $errors->first('freight_cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<br>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
