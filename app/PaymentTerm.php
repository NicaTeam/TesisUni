<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_terms';

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
    protected $fillable = ['name', 'description', 'numberDays'];



    public function companies(){

        return $this->hasMany(Company::class);

    }

    
}
