<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\Cigar;
use SalesProgram\BrandGroup;
use SalesProgram\UnitOfMeasurement;
use SalesProgram\cigar_size;
use SalesProgram\CategoryProduct;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use SalesProgram\Filters\CigarFilters;

class AxiosCigarController extends Controller
{
     public function __construct(){
         $this->middleware('auth', ['only' => 'store']);
        // $this->middleware('auth', ['only' => 'index']);

    }


    public function index(CigarFilters $filters)
    {
   

        $cigars = $this->getCigars($filters);

        // dd($cigars);

        if (request()->wantsJson()) {
            return $cigars;
        }


        return [

            'pagination' => [

                'total'        => $cigars->total(),
                'current_page' => $cigars->currentPage(),
                'per_page'     => $cigars->perPage(),
                'last_page'    => $cigars->lastPage(),
                'from'         => $cigars->firstItem(),
                'to'           => $cigars->lastItem(),

            ],

            'cigars' => $cigars

        ];

        // return $cigars;

    }


    protected function getCigars($filters)
    {

        $cigars = Cigar::latest()->filter($filters);


        $cigars = $cigars->paginate(4);

       

        return $cigars;


    }

    public function brandGroup()
    {

    	return $brandgroups = BrandGroup::all();

    }

     public function unitOfMeasurement()
    {

    	return $unitofmeasurements = UnitOfMeasurement::all();

    }

    public function cigarSize()
    {

    	return $cigarsizes = cigar_size::all();

    }

    public function categoryProduct()
    {

    	return $categoryproduct = CategoryProduct::all();

    }


    public function store(CigarFormRequest $request, Cigar $cigar)
    {

       if($request->get('image'))
       {
          $image = $request->get('image');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('imagenes/cigars/').$name);
        }

     
        return $cigar->create([   

            'brand_groups_id' => request('brand_groups_id'),

            'unit_of_measurements_id' => request('unit_of_measurements_id'),

            'cigar_sizes_id' => request('cigar_sizes_id'),

            'category_products_id' => request('category_products_id'),

            'barcode' => request('barcode'),

            'name' => request('name'),

            'netWeight' => request('netWeight'),

            'unitsInPresentation' => request('unitsInPresentation'),

            'image'=> $name,


            ]);


       // $image= new FileUpload();
       // $image->image_name = $name;
       // $image->save();

       // return response()->json(['success' => 'You have successfully uploaded an image'], 200);
       //  $cigar->saveItem($request);

       //  return redirect('cigars')->with('flash', 'The cigar has been created!');

    }

    public function update(Cigar $cigar){


         if (Input::hasFile('image')){

            $file =Input::file('image');
            $file->move(public_path().'/imagenes/cigars/', $file->getClientOriginalName());
            // $cigar->image=$file->getClientOriginalName();

        }


         $cigar->update([   

        'image'=> $file->getClientOriginalName(),

        ]);

         return redirect('cigars');
    }

}



