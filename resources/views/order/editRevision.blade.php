

    <div class="row">

       

        <div class="form-group {{ $errors->has('expected_shipping_date') ? 'has-error' : ''}}">
            <label for="expected_shipping_date" class="col-md-4 control-label">{{ 'Fecha esperada de envio' }}</label>
            <div class="col-md-6">
                <input class="form-control" name="expected_shipping_date" type="date" id="expected_shipping_date">
                {!! $errors->first('expected_shipping_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <br>
        <br>




        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
                <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Actualizar' }}">
            </div>
        </div>



    </div>



