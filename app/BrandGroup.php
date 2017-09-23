<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class BrandGroup extends Model
{

    protected $fillable=[

    'name',

    ];
    public function cigars(){

        return $this->hasMany('SalesProgram\Cigar');
    }
}
