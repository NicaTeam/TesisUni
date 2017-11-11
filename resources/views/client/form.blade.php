<div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}}">
    <label for="Name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="Name" type="text" id="Name" value="{{ $client->Name or ''}}" >
        {!! $errors->first('Name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
    <label for="lastName" class="col-md-4 control-label">{{ 'Lastname' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lastName" type="text" id="lastName" value="{{ $client->lastName or ''}}" >
        {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $client->email or ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('phoneNumber') ? 'has-error' : ''}}">
    <label for="phoneNumber" class="col-md-4 control-label">{{ 'Phonenumber' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="phoneNumber" type="text" id="phoneNumber" value="{{ $client->phoneNumber or ''}}" >
        {!! $errors->first('phoneNumber', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
