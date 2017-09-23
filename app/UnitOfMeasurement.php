<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class UnitOfMeasurement extends Model
{
    protected $fillable=[
        'name',
        ];


    public function cigar(){


        return $this->hasMany('SalesProgram\Cigar');
    }
}
