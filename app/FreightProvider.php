<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class FreightProvider extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'freight_providers';

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
    protected $fillable = ['name', 'address', 'email', 'telephone', 'contact_name'];

    
}
