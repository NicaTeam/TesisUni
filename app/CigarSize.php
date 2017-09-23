<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class CigarSize extends Model
{
    protected $fillable =[

        'name'

    ];

    public function cigar(){


        return $this->hasMany('SalesProgram\Cigar');
    }
}
