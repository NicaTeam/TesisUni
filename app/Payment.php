<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'wire_transfer_number', 'bank_name', 'amount_due', 'net_amount_paid', 'external_bank_commission', 'internal_bank_commission', 'new_amount_due'];


    public function order()
    {

        return $this->belongsTo(Order::class);
    }

    
}
