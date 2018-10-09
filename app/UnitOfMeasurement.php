<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class UnitOfMeasurement extends Model
{
    protected $table = 'unit_of_measurements';

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

    protected $fillable=[
        'name',
        ];


    public function cigar(){


        return $this->hasMany(Cigar::class);
    }

    // public function cigars(){

    //     return $this->hasMany(Cigar::class);
    // }
}
