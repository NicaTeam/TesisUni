<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'titles';

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

    public function person(){

        return $this->hasMany('SalesProgram\Person', 'titles_id');
    }

    
}
