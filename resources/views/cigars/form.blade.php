
<div class="form-group">
    {!! Form::label('categoryProduct', 'Categoria de Producto:') !!}
    <select name = 'category_products_id' class ="form-control">
        @foreach($categoryProduct as $categoryProduct)


            <option value="{{ $categoryProduct->id }}">

                {{ $categoryProduct->categoria }}

            </option>

        @endforeach

    </select>

</div>
<div class="form-group">
    {!! Form::label('brandGroup', 'Linea de Puros:') !!}
    <select name = 'brand_groups_id' class ="form-control">
         @foreach($brandGroups as $brandGroup)


             <option value="{{ $brandGroup->id }}">

                 {{ $brandGroup->name }}

             </option>

        @endforeach

    </select>

</div>


<div class="form-group">
    {!! Form::label('unitOfMeasurement', 'Presentation:') !!}
    <select name = 'unit_of_measurements_id' class ="form-control">
        @foreach($unitOfMeasurements as $unitOfMeasurement)


            <option value="{{ $unitOfMeasurement->id }}">

                {{ $unitOfMeasurement->name }}

            </option>

        @endforeach

    </select>

</div>


<div class="form-group">
    {!! Form::label('cigarSize', 'Vitola/Tamano:') !!}
    <select name = 'cigar_sizes_id' class ="form-control">
        @foreach($cigarSizes as $cigarSize)


            <option value="{{ $cigarSize->id }}">

                {{ $cigarSize->name }}

            </option>

        @endforeach

    </select>

</div>



<div class="form-group">


    {!! Form::label('barcode', 'Codigo de Barras:') !!}

    {!! Form::text('barcode', null, ['class' => 'form-control']) !!}


</div>

<div class="form-group">


    {!! Form::label('name', 'Nombre:') !!}

    {!! Form::text('name', null, ['class' => 'form-control']) !!}


</div>





<div class="form-group">

    {!! Form::label('netWeight', 'Peso Neto gr.:') !!}
    {!! Form::text('netWeight', null, ['class' => 'form-control']) !!}


</div>

<div class="form-group">

    {!! Form::label('unitsInPresentation', 'Unidades de presentacion:') !!}
    {!! Form::text('unitsInPresentation', null, ['class' => 'form-control']) !!}


</div>



<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=> 'btn btn-primary form-control']) !!}

</div>

@section('footer')

    <script >

        $('#brandGroup_list').select2({

            placeholder:'Choose a tag'
        });
    </script>



@endsection
