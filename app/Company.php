<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use SalesProgram\Country;
use SalesProgram\Http\Requests\PersonFormRequest;

class Company extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

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
    protected $fillable = ['name', 'countries_id', 'company_types_id', 'shippingAddress', 'telephone'];


    public function country(){

        return $this->belongsTo('SalesProgram\Country','countries_id');
    }

    public function companyTypes(){

        return $this->belongsTo('SalesProgram\CompanyType', 'company_types_id');
    }


    public function persons()
    {
        return $this->hasMany('SalesProgram\Person');

    }



    
}
