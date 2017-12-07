<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Pilon extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pilons';

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
    protected $fillable = ['NameTabacco', 'MorningTemperture', 'AfternoonTemperture', 'PilonNumber'];

    
}
