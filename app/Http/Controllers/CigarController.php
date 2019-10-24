<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\Cigar;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // This is to be able to upload the image to the server.
use SalesProgram\BrandGroup;
use SalesProgram\UnitOfMeasurement;
use SalesProgram\cigar_size;
use SalesProgram\Http\Requests\CigarFormRequest;
use DB;
use SalesProgram\categoryProduct;
use Session;
use SalesProgram\Filters\CigarFilters;


class CigarController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only' => 'index']);
        //$this->middleware('auth', ['except' => 'index']);

    }




    public function index(BrandGroup $brandGroup, CigarFilters $filters)
    {

        // $cigars = Cigar::all();

        

        $cigars = $this->getCigars($brandGroup, $filters);

        // dd($cigars);

        if (request()->wantsJson()) {
            return $cigars;
        }

//        //$articles = DB::table('articles')->latest()->get();
//        $articles = Article::latest('published_at')->Published()->get();
//        //return view('Pages.articles', compact('articles'));
//
//        $latest = Article::latest()->first();
//        //return view('articles.index')->with('articles', $articles);
//        return view('articles.index', compact('articles', 'latest'));

        //$cigar = Cigar::latest()->get();

//       $keyword = $request->get('search');
//        $perPage = 25;
//
//        if (!empty($keyword)) {
////            $cigar = Cigar::where('name', 'LIKE', "%$keyword%")
////                ->orWhere('barcode', 'LIKE', "%$keyword%")
////                ->orWhere('netWeight', 'LIKE', "%$keyword%")
////                ->orWhere('unitsInPresentation', 'LIKE', "%$keyword%")
////                ->paginate($perPage);
//
//
//        } else {
//            //$cigar = Cigar::paginate($perPage);
//            $cigar = Cigar::selectRaw('cigars.id id, cigars.barcode barcode, cigars.name name, cigar_sizes.name Vitola, cigars.netWeight netWeight, cigars.unitsInPresentation unitsInPresentation, brand_groups.id Brand_Groups_ID, brand_groups.name  Linea, unit_of_measurements.name Unidad, cigars.image Imagen ')
//                ->join('brand_groups','cigars.brand_groups_id', '=','brand_groups.id')
//                ->join('unit_of_measurements', 'cigars.unit_of_measurements_id','=', 'unit_of_measurements.id')
//                ->join('cigar_sizes', 'cigars.cigar_sizes_id', '=', 'cigar_sizes.id')
//                ->where('cigars.active', '=', '1')
//                ->get()
//                ->toArray();
//
//        }

//         if ($request){

//             $keyword = $request->get('search');
//             $perPage = 5;

//             $cigar = DB::table('cigars as c')
//                 ->join('brand_groups as bg','c.brand_groups_id', '=','bg.id')
//                 ->join('unit_of_measurements as um', 'c.unit_of_measurements_id','=', 'um.id')
//                 ->join('cigar_sizes as cz', 'c.cigar_sizes_id', '=', 'cz.id')
//                 ->select('c.id as cigar_id', 'c.barcode', 'c.name', 'cz.name as Vitola', 'c.netWeight', 'c.unitsInPresentation', 'bg.id', 'bg.name as Linea', 'um.name as Unidad', 'c.image as Imagen')
//                 ->where('c.name', 'LIKE', "%$keyword%")
//                 ->orWhere('c.barcode', 'LIKE', "%$keyword%")
//                 ->orderBy('c.id', 'desc')
//                 ->paginate($perPage);
// //

//             return view('cigars.index', compact('cigar'));


//         }

        //dd($cigar);

        //$cigars = Cigar::latest()->active()->get();
        // return view('cigars.index', compact('cigars'));

        return view('cigars.indexWithVueComponent', compact('cigars'));

        // return view('cigars.index', ['cigars'=> $cigars->paginate(3)]);
    }

    protected function getCigars($brandGroup, $filters)
    {

        // $threads = Thread::with('channel')->latest()->filter($filters);

        // dd($filters);


        // $cigars = Cigar::latest()->filter($filters);

        // $cigars = Cigar::where('active', 1)->filter($filters);

        $cigars = Cigar::latest()->filter($filters);

        // dd($cigars->get());

        // $cigars = Cigar::latest();

        // dd($cigars->get());


        if($brandGroup->exists){

            $cigars->where('brand_group_id', $brandGroup->id);
        }

        //dd($threads->toSql());


        $cigars = $cigars->paginate(4);

       

        return $cigars;


    }




    public function show(Cigar $cigar){

//    	$article = Article::findOrFail($id);

        //dd($article->published_at->diffForHumans());
        return view('cigars.show', compact('cigar'));

    }





    public function create(){

        $brand_group = BrandGroup::all();

        $units_of_measurements = UnitOfMeasurement::all();
        $cigar_sizes = cigar_size::all();
        $category_products = CategoryProduct::where('id', '=', 1)->pluck('categoria', 'id');
        //dd($category_products);
        //$categoryProduct = categoryProduct::all();
        return view('cigars.create',['brand_group'=>$brand_group, 'units_of_measurements'=> $units_of_measurements, 'cigar_sizes' => $cigar_sizes, 'category_products' => $category_products]);
    }





    public function store(CigarFormRequest $request, BrandGroup $brandGroup, Cigar $cigar)
    {

        // dd($request);




       // return response()->json(['success' => 'You have successfully uploaded an image'], 200);
        $cigar->saveItem($request);

        // $cigar = new Cigar;
        // $cigar->brand_groups_id=$request->get('brand_groups_id');
        // $cigar->unit_of_measurements_id=$request->get('unit_of_measurements_id');
        // $cigar->cigar_sizes_id=$request->get('cigar_sizes_id');
        // $cigar->category_products_id=$request->get('category_products_id');
        // $cigar->barcode=$request->get('barcode');
        // $cigar->name=$request->get('name');
        // $cigar->netWeight=$request->get('netWeight');
        // $cigar->unitsInPresentation=$request->get('unitsInPresentation');

        // if (Input::hasFile('image')){

        //     $file =Input::file('image');
        //     $file->move(public_path().'/imagenes/cigars/', $file->getClientOriginalName());
        //     $cigar->image=$file->getClientOriginalName();

        // }
       
        // $cigar->save();

        // flash()->overlay('Your cigar has been created!', 'Good Job');

        //Session::flash('success', 'Producto agregado con exito!');
        return redirect('cigars')->with('flash', 'The cigar has been created!');

    }

    public function edit(Cigar $cigar)
    {
       //$brand_group = $cigar->brandGroup->toArray();
        $brand_group = BrandGroup::pluck('name', 'id');
        $selectedBrand = $cigar->brand_groups_id;

        $units_of_measurements = UnitOfMeasurement::pluck('name', 'id');
        $selectedUnit = $cigar->units_of_measurements_id;

        $cigarSizes = cigar_size::pluck('name', 'id');
        $selectedSize = $cigar->cigar_sizes_id;

        $categoryProduct = CategoryProduct::where('id', '=', 1)->pluck('categoria', 'id');
        $selectedCategory = $cigar->category_products_id;

        //dd($categoryProduct);

        //dd($brand_group);
       return view('cigars.edit', compact('cigar', 'brand_group','selectedBrand', 'units_of_measurements', 'selectedUnit', 'cigarSizes', 'selectedSize', 'categoryProduct','selectedCategory'));


    }

    public function update(Cigar $cigar, CigarFormRequest $request){
        //$article = Article::findOrFail($id);

        // dd($request);

                // if (Input::hasFile('image')){

                //     $file =Input::file('image');
                //     $file->move(public_path().'/imagenes/cigars/', $file->getClientOriginalName());
                //     // $cigar->image=$file->getClientOriginalName();

                // }


                     $cigar->update([   

                    'brand_groups_id' => request('brand_groups_id'),

                    'unit_of_measurements_id' => request('unit_of_measurements_id'),

                    'cigar_sizes_id' => request('cigar_sizes_id'),

                    'category_products_id' => request('category_products_id'),

                    'barcode' => request('barcode'),

                    'name' => request('name'),

                    'netWeight' => request('netWeight'),

                    'unitsInPresentation' => request('unitsInPresentation'),

                    // 'image'=> $file->getClientOriginalName(),

                    ]);


        // $cigar->update($request->all());
        //$article->tags()->sync($request->input('tag_list'));
        //$this->syncTags($article, $request->input('tag_list'));
        // return Redirect::to('cigars');
    }

    public function destroy(Cigar $cigar)
    {
        // $cigar = Cigar::findOrFail($id);

        $cigar->active = '0';

        $cigar->update();

       // Session::flash('flash_message', 'cigar_size deleted!');

        return redirect('cigars')->with('flash', 'El producto fue eliminado correctamente!');
    }



    private function createCigar( CigarFormRequest $request){


        $brandGroup = $request->input('brandGroup_list');
        $cigar = new Cigar($request->all());
        $cigar->brandGroup()->associate($brandGroup);
        $cigar->save();
        //$brandGroup()->cigars()->save($cigar);
////        $cigar = BrandGroup()->cigars()->create($request->all());
//        //$tagsIds = $request->input('tag_list');
//        //$article->tags()->attach($tagsIds);
//
////        $this->syncTags($article, $request->input('tag_list'));

        return $cigar;

    }

    private function syncData(Cigar $cigar, array $brandGroup, array $unitOfMeasurement, array $cigarSize){


        $cigar->brandGroup()->sync($brandGroup);
        $cigar->unitOfMeasurement()->sync($unitOfMeasurement);
        $cigar->cigarSize()->sync($cigarSize);

    }
}
