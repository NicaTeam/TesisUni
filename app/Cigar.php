<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

class Cigar extends Model
{

    protected $fillable=[
        'category_products_id',
        'brand_groups_id',
        'unit_of_measurements_id',
        'cigar_sizes_id',
        'barcode',
        'name',
        'netWeight',
        'unitsInPresentation',
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


        return $this->belongsTo('SalesProgram\UnitOfMeasurement');
    }

    public function cigarSize(){

        return $this->belongsTo('SalesProgram\CigarSize');
    }

    public function getBranGroupListAttribute(){

        return $this->brandGroup->pluck('id');

    }



}
