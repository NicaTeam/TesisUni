<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
    protected $fillable = [ 'companies_id'];



    public function companies(){


        return $this->belongsTo(Company::class);
    }

    public function customsAgencies(){

        return $this->hasMany(CustomsAgency::class);
    }
}
