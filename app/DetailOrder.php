<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detail_orders';

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
    protected $fillable = ['order_id', 'cigar_id', 'cigar_barcode', 'brand_name', 'cigar_name', 'cigar_size_name', 'cigar_netWeight', 'quantity', 'cigar_unitOfMeasurement_name', 'subTotalCigars', 'cigar_price', 'subAmount', 'cigar_unitsInPresentation'];

    public function order(){

        return $this->belongsTo(Order::class);

    }

    
}
