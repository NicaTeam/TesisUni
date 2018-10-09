<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Session;

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

    protected $guarded = [];

    // protected $hidden = ['image'];

    protected $with = ['brandGroup', 'unitOfMeasurement', 'cigarSize', 'categoryProduct'];


    protected static function boot()
    {

        // parent::boot();

        // static::addGlobalScope('active', function($builder){

        //     $builder->where('active', 1);
        // });

        

       
    }


    // public function scopeActive($query){

    //     return $query->where('active', 1);


    // }

    // public function scopeUnactive($query){

    //     return $query->where('active', 0);


    // }


    // public function brandGroup(){

    //     return  $this->belongsTo('SalesProgram\BrandGroup');

    // }

    public function brandGroup(){

        return $this->belongsTo(BrandGroup::class, 'brand_groups_id');
    }


    public function unitOfMeasurement(){


        return $this->belongsTo(UnitOfMeasurement::class, 'unit_of_measurements_id');
    }



    // public function cigarSize(){

    //     return $this->belongsTo('SalesProgram\cigarsize');
    // }

    public function cigarSize()
    {

        return $this->belongsTo(cigar_size::class, 'cigar_sizes_id');
    }


    public function categoryProduct()
    {

        return $this->belongsTo(CategoryProduct::class, 'category_products_id');
    }



    public function getBranGroupListAttribute(){

        return $this->brandGroup->pluck('id');

    }

    public function priceRegistrationDetail(){

        return $this->belongsToMany(PriceRegistrationDetail::class);

    }


     public function saveItem($request)
    {

        $brandGroup = ['brand_groups_id' => request('brand_groups_id')];
        $UnitOfMeasurement = ['unit_of_measurements_id' => request('unit_of_measurements_id')];
        $cigarSize = ['cigar_sizes_id' => request('cigar_sizes_id')];
        $categoryProduct = ['category_products_id' => request('category_products_id')];
        $barcode = ['barcode' => request('barcode')];
        $unitsInPresentation = ['unitsInPresentation' => request('unitsInPresentation')];

        // dd($this->where($barcode)->exists());


        //  $cigar->brand_groups_id=$request->get('brand_groups_id');
        // $cigar->unit_of_measurements_id=$request->get('unit_of_measurements_id');
        // $cigar->cigar_sizes_id=$request->get('cigar_sizes_id');
        // $cigar->category_products_id=$request->get('category_products_id');
        // $cigar->barcode=$request->get('barcode');
        // $cigar->name=$request->get('name');
        // $cigar->netWeight=$request->get('netWeight');
        // $cigar->unitsInPresentation=$request->get('unitsInPresentation');

        // if(! $this->brandGroup()->where($attributes)->exists() && ! $this->unitOfMeasurement()->where($attributes)->exists() && ! $this->cigarSize()->where($attributes)->exists() && ! $this->cigarSize()->where($attributes)->exists() && ! $this->categoryProduct()->where($attributes)->exists()){

        if($this->where($brandGroup)->exists() && $this->where($UnitOfMeasurement)->exists() && $this->where($cigarSize)->exists() && $this->where($categoryProduct)->exists() && $this->where($barcode)->exists() && $this->where($unitsInPresentation)->exists()){


            // return Session::flash('flash', 'Item ya existe en la base de datos');

            return redirect('cigars')->with('flash', 'Producto ya existe en la base de datos!');


        }else{


            // return $this->favorites()->create($attributes);

              // if (Input::hasFile('image')){

              //       $file =Input::file('image');
              //       $file->move(public_path().'/imagenes/cigars/', $file->getClientOriginalName());
              //       // $cigar->image=$file->getClientOriginalName();

              //   }


                 if($request->get('image'))
                {
                  $image = $request->get('image');
                  $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                  \Image::make($request->get('image'))->save(public_path('imagenes/cigars/').$name);
                }

                return $this->create([   

                    'brand_groups_id' => request('brand_groups_id'),

                    'unit_of_measurements_id' => request('unit_of_measurements_id'),

                    'cigar_sizes_id' => request('cigar_sizes_id'),

                    'category_products_id' => request('category_products_id'),

                    'barcode' => request('barcode'),

                    'name' => request('name'),

                    'netWeight' => request('netWeight'),

                    'unitsInPresentation' => request('unitsInPresentation'),

                    // 'image'=> $file->getClientOriginalName(),

                     'image'=> $name,


                    ]);

        }
        
    }


    public function scopeFilter($query, $filters)
    {

        // dd($query->toSql());

        return $filters->apply($query);   

    }



}
