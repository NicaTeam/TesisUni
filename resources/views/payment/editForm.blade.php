<editpayment :payment="{{ $payment }}" inline-template>

    <div>

        <div class="row">

            <div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
                

                <div class="col-md-6">
                    <label for="order_id" class="col-md-6 control-label">{{ 'Orden' }}</label>
                    <input class="form-control" name="reference" type="text" id="reference" value="{{ $payment->order->reference or ''}}" readonly> 
                    
                    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>

        <div class="row">

            <div class="form-group {{ $errors->has('wire_transfer_number') ? 'has-error' : ''}}">
                
                <div class="col-md-6">
                    <label for="wire_transfer_number" class="col-md-6 control-label">{{ 'Número de transferencia' }}</label>
                    <input class="form-control" name="wire_transfer_number" type="number" id="wire_transfer_number" value="{{ $payment->wire_transfer_number or ''}}" >
                    {!! $errors->first('wire_transfer_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="row">

            <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : ''}}">
                
                <div class="col-md-6">
                    <label for="bank_name" class="col-md-6 control-label">{{ 'Nombre del banco' }}</label>
                    <input class="form-control" name="bank_name" type="text" id="bank_name" value="{{ $payment->bank_name or ''}}" >
                    {!! $errors->first('bank_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>

        <div class="row">

            <div class="form-group {{ $errors->has('amount_due') ? 'has-error' : ''}}">
                
                <div class="col-md-6">
                    <label for="amount_due" class="col-md-6 control-label">{{ 'Monto de la deuda' }}</label>
                    <input v-model="amount_due" class="form-control" name="amount_due" type="number" id="amount_due" value="{{ $payment->amount_due or ''}}" readonly>
                    {!! $errors->first('amount_due', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>


        <div class="row">

            <div class="form-group {{ $errors->has('net_amount_paid') ? 'has-error' : ''}}">
                
                <div class="col-md-6">
                    <label for="net_amount_paid" class="col-md-6 control-label">{{ 'Monto neto pagado' }}</label>
                    <input v-model="net_amount_paid" class="form-control" name="net_amount_paid" type="number" step="0.01" id="net_amount_paid" value="{{ $payment->net_amount_paid or ''}}" >
                    {!! $errors->first('net_amount_paid', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>


        <div class="row">

            <div class="form-group {{ $errors->has('external_bank_commission') ? 'has-error' : ''}}">
                
                <div class="col-md-6">
                    <label for="external_bank_commission" class="col-md-6 control-label">{{ 'Comisión bancaria externa' }}</label>
                    <input v-model="external_bank_commission" class="form-control" name="external_bank_commission" type="number" id="external_bank_commission" v-on:keyup.prevent="calcularNuevoMontoAdeudado" step="0.01">
                    {!! $errors->first('external_bank_commission', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>


        <div class="row">

            <div class="form-group {{ $errors->has('internal_bank_commission') ? 'has-error' : ''}}">
                
                <div class="col-md-6">
                    <label for="internal_bank_commission" class="col-md-6 control-label">{{ 'Comisión bancaria interna(Banpro)' }}</label>
                    <input v-model="internal_bank_commission" class="form-control" name="internal_bank_commission" type="number" id="internal_bank_commission"  v-on:keyup.prevent="calcularNuevoMontoAdeudado" step="0.01">
                    {!! $errors->first('internal_bank_commission', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>


        <div class="row">

            <div class="form-group {{ $errors->has('new_amount_due') ? 'has-error' : ''}}">
                
                <div class="col-md-6">
                    <label for="new_amount_due" class="col-md-6 control-label">{{ 'Nuevo monto adeudado' }}</label>
                    <input v-model="new_amount_due" class="form-control" name="new_amount_due" type="number" id="new_amount_due" >
                    {!! $errors->first('new_amount_due', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <br>

        <div class="row">

            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Actualizar' }}">
                </div>
            </div>

        </div>

    </div>

</editpayment>