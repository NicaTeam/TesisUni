<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agents';

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
    protected $fillable = ['name', 'country_id', 'shippingAddress', 'telephone', 'email', 'contact_name', 'company_id'];

    public function company()
    {

        return $this->belongsTo(Company::class);
    }

    public function country()
    {

        return $this->belongsTo(Country::class);
    }

    
}
