<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'people';

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
    protected $fillable = ['name', 'titles_id', 'lastName', 'email', 'telephone', 'company_id'];

    public function title(){

        return $this->belongsTo('SalesProgram\Title', 'titles_id');
    }

    public function company(){

        return $this->belongsTo('SalesProgram\Company', 'company_id');
    }


}
