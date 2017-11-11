<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'designers';

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
    protected $fillable = ['Name', 'lastName', 'email', 'phone_Number'];

    
}
