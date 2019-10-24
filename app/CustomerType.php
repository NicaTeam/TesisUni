<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class customerType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer_types';

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


    protected $guarded = [];
    
    protected $fillable = ['clienteTipo', 'descripcion'];

    protected $with = ['priceRegistrationDetail'];


    // public function companies(){


    //     return $this->belongsToMany(Company::class);//, 'company_customer_type', 'company_id','customer_type_id'


    // }

    public function companies()
    {

        return $this->hasMany(Company::class);

    }

    // public function priceRegistrationDetail(){

    //     return $this->belongsToMany(PriceRegistrationDetail::class);

    // }

    public function priceRegistrationDetail()
    {

        return $this->hasMany(PriceRegistrationDetail::class);
    }

    
}
