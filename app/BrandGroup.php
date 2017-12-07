<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class BrandGroup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'brand_groups';

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


    public function cigars(){

        return $this->hasMany('SalesProgram\Cigar');
    }
}
