<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;
use SalesProgram\Company;

class Country extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

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
    protected $fillable = ['alfaNumericCode', 'name'];


    public function companies(){


        return $this->hasMany('SalesProgram\Company', 'countries_id');
    }

    
}
