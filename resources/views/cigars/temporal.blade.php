<div class="form-group">
    {!! Form::label('unitOfMeasurement_list', 'Presentation:') !!}
    {!! Form::select('unitOfMeasurement_list[]', $unitOfMeasurement, null, [ 'id' => 'unitOfMeasurement_list', 'class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('cigarSize_list', 'Cigar or Vitola:') !!}
    {!! Form::select('cigarSize_list[]', $cigarSize, null, [ 'id' => 'cigarSize_list', 'class' => 'form-control']) !!}

</div>