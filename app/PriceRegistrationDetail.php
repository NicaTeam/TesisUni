<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class PriceRegistrationDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'price_registration_details';

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
    protected $fillable = ['price_registration_id', 'cigar_id', 'customer_type_id', 'price', 'active'];

    public function priceRegistration(){

        return $this->belongsTo(PriceRegistration::class);

    }

    public function cigars(){

        return $this->belongsToMany(Cigar::class,'price_registration_details', 'id');
    }

    public function customerType(){

        return $this->belongsToMany(CustomerType::class,'price_registration_details', 'id');
    }
}
