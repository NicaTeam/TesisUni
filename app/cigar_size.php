<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class cigar_size extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cigar_sizes';

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


    // public function cigar(){


    //     return $this->hasMany('SalesProgram\Cigar');
    // }

     public function cigar(){


        return $this->hasMany(Cigar::class);
    }

    //  public function cigars(){

    //     return $this->hasMany(Cigar::class);
    // }
}