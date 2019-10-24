
<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="col-md-4 control-label">{{ 'Orden' }}</label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="order_id" type="number" id="order_id" value="{{ $shipping->order_id or ''}}" > -->

        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    
            <select  name="order_id" id="order_id" class="form-control selectpicker" data-live-search="true">

                @foreach($orders as $item)

                            <option value="{{ $item->id }}">{{ $item->reference.' | Cliente: '. $item->company_name }}</option>

                @endforeach
            </select>
   
        </div>
        {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
    </div>
                        
                            
                        
</div>

<div class="form-group {{ $errors->has('invoiceNumbers') ? 'has-error' : ''}}">
    <label for="invoiceNumbers" class="col-md-4 control-label">{{ 'Números de facturas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="invoiceNumbers" type="text" id="invoiceNumbers" value="{{ $shipping->invoiceNumbers or ''}}" required>
        {!! $errors->first('invoiceNumbers', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group {{ $errors->has('invoicesFiles') ? 'has-error' : ''}}">
    <label for="invoicesFiles" class="col-md-4 control-label">{{ 'Invoicesfiles' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="invoicesFiles" type="text" id="invoicesFiles" value="{{ $shipping->invoicesFiles or ''}}" >
        {!! $errors->first('invoicesFiles', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

 <div class="form-group {{ $errors->has('invoicesFiles') ? 'has-error' : ''}}">
    <label for="invoicesFiles" class="col-md-4 control-label">{{ 'Archivos de facturas' }}</label>
    <div class="col-md-6">
        
        <input class="form-control" name="invoicesFiles" type="file" id="invoicesFiles"  >
        {!! $errors->first('invoicesFiles', '<p class="help-block">:message</p>') !!}

    </div>
</div>

<div class="form-group {{ $errors->has('packingListFiles') ? 'has-error' : ''}}">
    <label for="packingListFiles" class="col-md-4 control-label">{{ 'Archivos de lista de embarque' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="packingListFiles" type="file" id="packingListFiles" value="{{ $shipping->packingListFiles or ''}}" >
        {!! $errors->first('packingListFiles', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('awbFiles') ? 'has-error' : ''}}">
    <label for="awbFiles" class="col-md-4 control-label">{{ 'Guia aéreas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="awbFiles" type="file" id="awbFiles" value="{{ $shipping->awbFiles or ''}}" >
        {!! $errors->first('awbFiles', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sanitaryCertificateFiles') ? 'has-error' : ''}}">
    <label for="sanitaryCertificateFiles" class="col-md-4 control-label">{{ 'Certificado sanitario' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sanitaryCertificateFiles" type="file" id="sanitaryCertificateFiles" value="{{ $shipping->sanitaryCertificateFiles or ''}}" >
        {!! $errors->first('sanitaryCertificateFiles', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('freight_type_name') ? 'has-error' : ''}}">
    <label for="freight_type_name" class="col-md-4 control-label">{{ 'Tipo de flete' }}</label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="freight_type_name" type="text" id="freight_type_name" value="{{ $shipping->freight_type_name or ''}}" > -->

        <select  name="freight_type_name" id="freight_type_name" class="form-control" required>

            <option value="">Selecione tipo de flete</option>

            @foreach($freightTypes as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>

            @endforeach
        </select>
        {!! $errors->first('freight_type_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('freight_provider_id') ? 'has-error' : ''}}">
    <label for="freight_provider_id" class="col-md-4 control-label">{{ 'Proveedor de flete' }}</label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="freight_provider_id" type="number" id="freight_provider_id" value="{{ $shipping->freight_provider_id or ''}}" > -->

        <select  name="freight_provider_id" id="freight_provider_id" class="form-control" required>

            <option value="">Selecione proveedor de flete</option>

            @foreach($freightProviders as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>

            @endforeach
        </select>


        {!! $errors->first('freight_provider_id', '<p class="help-block">:message</p>') !!}
    </div>
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
        <input class="form-control" name="freight_cost" type="number" id="freight_cost" value="{{ $shipping->freight_cost or ''}}" >
        {!! $errors->first('freight_cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
