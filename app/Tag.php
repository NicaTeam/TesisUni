<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /*
    *
    *Fillable fields for a tag.
    *@var 
    *
    */

    protected $fillable = [ 'name' ];
    /*
    *Get the articles associated with the given Tag
    *
    *
    *@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    *
    *
    */
    public function articles(){


    	return $this->belongsToMany('SalesProgram\Article');


    }
}
