<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="col-md-4 control-label">{{ 'Order Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="order_id" type="number" id="order_id" value="{{ $orderstatus->order_id or ''}}" >
        {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
    <label for="status_id" class="col-md-4 control-label">{{ 'Status Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status_id" type="number" id="status_id" value="{{ $orderstatus->status_id or ''}}" >
        {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
