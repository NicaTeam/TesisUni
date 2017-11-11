<div class="form-group {{ $errors->has('clienteTipo') ? 'has-error' : ''}}">
    <label for="clienteTipo" class="col-md-4 control-label">{{ 'Tipo de distribuidor' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="clienteTipo" type="text" id="clienteTipo" value="{{ $customertype->clienteTipo or ''}}" >
        {!! $errors->first('clienteTipo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Descripcion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ $customertype->descripcion or ''}}" >
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
