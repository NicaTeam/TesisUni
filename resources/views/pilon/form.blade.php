<div class="form-group {{ $errors->has('NameTabacco') ? 'has-error' : ''}}">
    <label for="NameTabacco" class="col-md-4 control-label">{{ 'Nametabacco' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="NameTabacco" type="text" id="NameTabacco" value="{{ $pilon->NameTabacco or ''}}" >
        {!! $errors->first('NameTabacco', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('MorningTemperture') ? 'has-error' : ''}}">
    <label for="MorningTemperture" class="col-md-4 control-label">{{ 'Morningtemperture' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="MorningTemperture" type="text" id="MorningTemperture" value="{{ $pilon->MorningTemperture or ''}}" >
        {!! $errors->first('MorningTemperture', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('AfternoonTemperture') ? 'has-error' : ''}}">
    <label for="AfternoonTemperture" class="col-md-4 control-label">{{ 'Afternoontemperture' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="AfternoonTemperture" type="text" id="AfternoonTemperture" value="{{ $pilon->AfternoonTemperture or ''}}" >
        {!! $errors->first('AfternoonTemperture', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('PilonNumber') ? 'has-error' : ''}}">
    <label for="PilonNumber" class="col-md-4 control-label">{{ 'Pilonnumber' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="PilonNumber" type="text" id="PilonNumber" value="{{ $pilon->PilonNumber or ''}}" >
        {!! $errors->first('PilonNumber', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
