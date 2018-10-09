<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class categoryProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_products';

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
    protected $fillable = ['categoria', 'descripcion'];


    public function cigars(){

        return $this->hasMany(Cigar::class);
    }

    
}
