<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shippings';

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
    protected $fillable = ['order_id', 'invoiceNumbers', 'invoicesFiles', 'packingListFiles', 'awbFiles', 'sanitaryCertificateFiles', 'freight_type_name', 'freight_provider_id', 'freight_provider_name', 'freight_cost'];


    public function order()
    {

        return $this->belongsTo(Order::class);
    }

    
}
