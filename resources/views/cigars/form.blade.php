

<div class="form-group">
    {!! Form::label('brandGroup', 'Brand Group:') !!}
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
    {!! Form::label('cigarSize', 'Cigar Size:') !!}
    <select name = 'cigar_sizes_id' class ="form-control">
        @foreach($cigarSizes as $cigarSize)


            <option value="{{ $cigarSize->id }}">

                {{ $cigarSize->name }}

            </option>

        @endforeach

    </select>

</div>


<div class="form-group">


    {!! Form::label('name', 'Name:') !!}

    {!! Form::text('name', null, ['class' => 'form-control']) !!}


</div>





<div class="form-group">

    {!! Form::label('netWeight', 'Net Weight:') !!}
    {!! Form::text('netWeight', null, ['class' => 'form-control']) !!}


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
