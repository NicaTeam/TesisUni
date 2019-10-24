    <div class="row">

       

        <div class="form-group {{ $errors->has('shipping_quote') ? 'has-error' : ''}}">
            <label for="shipping_quote" class="col-md-4 control-label">{{ 'Cotizacion de flete' }}</label>
            <div class="col-md-6">
                <input class="form-control" name="shipping_quote" step="0.01" type="number" id="shipping_quote">
                {!! $errors->first('shipping_quote', '<p class="help-block">:message</p>') !!}
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
