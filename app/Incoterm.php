<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Incoterm extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'incoterms';

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
    protected $fillable = ['name', 'description'];

    public function companies()
    {

        return $this->hasMany(Company::class);
    }

    
}
