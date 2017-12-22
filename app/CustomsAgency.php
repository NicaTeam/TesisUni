<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class CustomsAgency extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customs_agencies';

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
    protected $fillable = ['company_id', 'customer_id'];



    public function company(){


        return $this->belongsTo(Company::class);
    }

    public function customer(){

        return $this->belongsTo(Customer::class);

    }


    
}
