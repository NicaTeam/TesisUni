<div class="form-group {{ $errors->has('brand_groups_id') ? 'has-error' : ''}}">

    <label for="brand_groups_id" class="col-md-4 control-label">{{ 'Linea de Puros' }}</label>
    <div class="col-md-6">

        {{--{!! Form::label('brand_groups_id', 'Linea de Puros:') !!}--}}

        <select name = 'brand_groups_id' class ="form-control">
            @foreach($brand_group as $brand)


                <option value="{{ $brand->id }}">

                    {{ $brand->name }}

                </option>

            @endforeach

        </select>



        {{--{!! Form::select('brand_groups_id', $brand_group, null, [ 'class' => 'form-control']) !!}--}}

    </div>

</div>

<div class="form-group {{ $errors->has('unit_of_measurements_id') ? 'has-error' : ''}}">

    <label for="unit_of_measurements_id" class="col-md-4 control-label">{{ 'Presentacion' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('unit_of_measurements_id', 'Presentacion:') !!}--}}

        <select name = 'unit_of_measurements_id' class ="form-control">
            @foreach($units_of_measurements as $unit)


                <option value="{{ $unit->id }}">

                    {{ $unit->name }}

                </option>

            @endforeach

        </select>


        {{--{!! Form::select('unit_of_measurements_id', $units_of_measurements, null, [ 'class' => 'form-control']) !!}--}}

    </div>

</div>

<div class="form-group {{ $errors->has('cigar_sizes_id') ? 'has-error' : ''}}">

    <label for="cigar_sizes_id" class="col-md-4 control-label">{{ 'Vitola' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('cigar_sizes_id', 'Vitola:') !!}--}}
        <select name = 'cigar_sizes_id' class ="form-control">
            @foreach($cigar_sizes as $size)


                <option value="{{ $size->id }}">

                    {{ $size->name }}

                </option>

            @endforeach

        </select>
        {{--{!! Form::select('cigar_sizes_id', $cigarSizes, null, [ 'class' => 'form-control']) !!}--}}

    </div>

</div><div class="form-group {{ $errors->has('category_products_id') ? 'has-error' : ''}}">

    <label for="category_products_id" class="col-md-4 control-label">{{ 'Categoria' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('category_products_id', 'Categoria:') !!}--}}

        {!! Form::select('category_products_id', $category_products, null, [ 'class' => 'form-control', 'readonly' =>'true']) !!}

    </div>

</div>

<div class="form-group {{ $errors->has('barcode') ? 'has-error' : ''}}">
    <label for="barcode" class="col-md-4 control-label">{{ 'Codigo de Barra' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('barcode', 'Codigo de Barra:') !!}--}}
        <input class="form-control" name="barcode" type="text" id="barcode" required value="{{ $cigar->barcode or ''}}" >
        {!! $errors->first('barcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('name', 'Nombre:') !!}--}}
        <input class="form-control" name="name" type="text" id="name" required value="{{ $cigar->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('netWeight') ? 'has-error' : ''}}">
    <label for="netWeight" class="col-md-4 control-label">{{ 'Peso Neto' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('netWeight', 'Peso Neto:') !!}--}}
        <input class="form-control" name="netWeight" type="text" id="netWeight" required value="{{ $cigar->netWeight or ''}}" >
        {!! $errors->first('netWeight', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('unitsInPresentation') ? 'has-error' : ''}}">
    <label for="unitsInPresentation" class="col-md-4 control-label">{{ 'Presentacion' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('unitsInPresentation', 'Presentacion:') !!}--}}
        <input class="form-control" name="unitsInPresentation" type="text" id="unitsInPresentation" required value="{{ $cigar->unitsInPresentation or ''}}" >
        {!! $errors->first('unitsInPresentation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-md-4 control-label">{{ 'Imagen' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('unitsInPresentation', 'Presentacion:') !!}--}}
        <input class="form-control" name="image" type="file" id="image"  >
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
    </div>
</div>


{{--<div class="form-group">--}}

{{--<div class="col-md-offset-4 col-md-4">--}}
{{--{!! Form::submit($submitButtonText, ['class'=> 'btn btn-primary form-control']) !!}--}}

{{--</div>--}}

{{--</div>--}}





{{--<div class="form-group">--}}
{{--{!! Form::label('categoryProduct', 'Categoria de Producto:') !!}--}}
{{--<select name = 'category_products_id' class ="form-control">--}}
{{--@foreach($categoryProduct as $categoryProduct)--}}


{{--<option value="{{ $categoryProduct['id'] }}">--}}

{{--{{ $categoryProduct['categoria'] }}--}}

{{--</option>--}}

{{--@endforeach--}}

{{--</select>--}}

{{--</div>--}}







{{--<div class="form-group">--}}
    {{--<div class="col-md-offset-4 col-md-4">--}}

        {{--{!! Form::submit($submitButtonText, ['class'=> 'btn btn-primary form-control']) !!}--}}

    {{--</div>--}}

{{--</div>--}}