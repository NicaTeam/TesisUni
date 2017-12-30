<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class PriceRegistration extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'price_registrations';

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
    protected $fillable = ['user_id', 'validPeriod', 'active'];


    public function priceRegistrationDetails(){

        return $this->hasMany(PriceRegistrationDetail::class);
    }


    public function addDetail(PriceRegistrationDetail $priceRegistrationDetail){

        $this->priceRegistrationDetails()->save($priceRegistrationDetail);

        return $priceRegistrationDetail;

    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    
}
