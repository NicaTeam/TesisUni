<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
    protected $fillable = ['user_id', 'company_id', 'reference', 'company_name', 'company_shipping_addres', 'company_contact_name', 'company_contact_email', 'company_contact_telephone', 'payment_term_name', 'incoterm_name', 'customs_agency_name', 'customs_agency_shipping_address', 'customs_agency_contact_name', 'customs_agency_contact_email', 'customs_agency_contact_telephone', 'total_net_weight_in_grams', 'total_boxes', 'total_packs', 'total_cigars', 'amount_order_total', 'amount_due', 'raw_order_file', 'shipping_quote', 'final_freight_cost', 'grand_total', 'expected_shipping_date'];

    protected $with = ['details', 'statuses', 'company'];

    public function details(){

        return $this->hasMany(DetailOrder::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function company(){

        return $this->belongsTo(Company::class);
    }

    public function statuses()
    {

        return $this->belongsToMany(Status::class)->withTimestamps();

    }

    public function payments()
    {

        return $this->hasMany(Payment::class);
    }

    public function shippings()
    {

        return $this->hasMany(Shipping::class);
    }

    public function scopeLastYear($query)
    {

        return $query->where('created_at', '>=', Carbon::now()->subYears(1)->firstOfYear());
    }


    public function scopeTwoYearsAgo($query)
    {

        return $query->where('created_at', '>=', Carbon::now()->subYears(2)->firstOfYear());
    }

    public function scopeTwoYearsAgoEnd($query)
    {

        return $query->where('created_at', '<', Carbon::now()->subYears(2)->endOfYear());
    }




    
}
