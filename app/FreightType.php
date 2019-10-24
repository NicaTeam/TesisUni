<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class FreightType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'freight_types';

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
    protected $fillable = ['name'];

    
}
