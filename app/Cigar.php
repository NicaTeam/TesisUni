<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Cigar extends Model
{

    protected $table = 'cigars';

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
    protected $fillable=[
        'category_products_id',
        'brand_groups_id',
        'unit_of_measurements_id',
        'cigar_sizes_id',
        'barcode',
        'name',
        'netWeight',
        'unitsInPresentation',
        'image',
        'active',

        ];


    public function scopeActive($query){

        return $query->where('active', 1);


    }

    public function scopeUnactive($query){

        return $query->where('active', 0);


    }


    public function brandGroup(){

    return  $this->belongsTo('SalesProgram\BrandGroup');

    }


    public function unitOfMeasurement(){


        return $this->belongsTo(UnitOfMeasurement::class, 'unit_of_measurements_id');
    }



    public function cigarSize(){

        return $this->belongsTo('SalesProgram\cigarsize');
    }



    public function getBranGroupListAttribute(){

        return $this->brandGroup->pluck('id');

    }

    public function priceRegistrationDetail(){

        return $this->belongsToMany(PriceRegistrationDetail::class);

    }



}
