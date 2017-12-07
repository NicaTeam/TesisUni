
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
<div class="form-group {{ $errors->has('brand_groups_id') ? 'has-error' : ''}}">

    <label for="brand_groups_id" class="col-md-4 control-label">{{ 'Linea de Puros' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('brandGroup', 'Linea de Puros:') !!}--}}
        {!! Form::select('brand_groups_id', $brand_group, $selectedBrand, [ 'class' => 'form-control']) !!}

    </div>

</div>

<div class="form-group {{ $errors->has('units_of_measurements_id') ? 'has-error' : ''}}">

    <label for="unit_of_measurements_id" class="col-md-4 control-label">{{ 'Presentacion' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('brandGroup', 'Linea de Puros:') !!}--}}
        {!! Form::select('unit_of_measurements_id', $units_of_measurements, $selectedUnit, [ 'class' => 'form-control']) !!}

    </div>

</div>

<div class="form-group {{ $errors->has('cigar_sizes_id') ? 'has-error' : ''}}">

    <label for="cigar_sizes_id" class="col-md-4 control-label">{{ 'Vitola' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('brandGroup', 'Linea de Puros:') !!}--}}
        {!! Form::select('cigar_sizes_id', $cigarSizes, $selectedSize, [ 'class' => 'form-control']) !!}

    </div>

</div>

<div class="form-group {{ $errors->has('category_product_id') ? 'has-error' : ''}}">

    <label for="category_products_id" class="col-md-4 control-label">{{ 'Categoria' }}</label>
    <div class="col-md-6">
        {{--{!! Form::label('brandGroup', 'Linea de Puros:') !!}--}}
        {!! Form::select('category_products_id', $categoryProduct, $selectedCategory, [ 'class' => 'form-control', 'readonly' =>'true']) !!}

    </div>

</div>



<div class="form-group {{ $errors->has('barcode') ? 'has-error' : ''}}">
    <label for="barcode" class="col-md-4 control-label">{{ 'Codigo de barra' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="barcode" type="text" id="barcode" value="{{ $cigar['barcode'] or ''}}" >
        {!! $errors->first('barcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $cigar['name'] or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('netWeight') ? 'has-error' : ''}}">
    <label for="netWeight" class="col-md-4 control-label">{{ 'Peso Neto' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="netWeight" type="text" id="netWeight" value="{{ $cigar['netWeight'] or ''}}" >
        {!! $errors->first('netWeight', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('unitsInPresentation') ? 'has-error' : ''}}">
    <label for="unitsInPresentation" class="col-md-4 control-label">{{ 'Presentacion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="unitsInPresentation" type="text" id="unitsInPresentation" value="{{ $cigar['unitsInPresentation'] or ''}}" >
        {!! $errors->first('unitsInPresentation', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group">
    <div class="col-md-offset-4 col-md-4">

    {!! Form::submit($submitButtonText, ['class'=> 'btn btn-primary form-control']) !!}

    </div>

</div>

{{--<div class="form-group">--}}
    {{--<div class="col-md-offset-4 col-md-4">--}}
        {{--<input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">--}}
    {{--</div>--}}
{{--</div>--}}

@section('footer')

    <script >

        $('#brandGroup_list').select2({

            placeholder:'Choose a tag'
        });
    </script>



@endsection
