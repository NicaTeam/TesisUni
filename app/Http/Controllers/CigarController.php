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

class CigarController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only' => 'create']);
        //$this->middleware('auth', ['except' => 'index']);

    }




    public function index(Request $request){
//        //$articles = DB::table('articles')->latest()->get();
//        $articles = Article::latest('published_at')->Published()->get();
//        //return view('Pages.articles', compact('articles'));
//
//        $latest = Article::latest()->first();
//        //return view('articles.index')->with('articles', $articles);
//        return view('articles.index', compact('articles', 'latest'));

        //$cigar = Cigar::latest()->get();

        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $cigar = Cigar::where('name', 'LIKE', "%$keyword%")
                ->orWhere('barcode', 'LIKE', "%$keyword%")
                ->orWhere('netWeight', 'LIKE', "%$keyword%")
                ->orWhere('unitsInPresentation', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            //$cigar = Cigar::paginate($perPage);
            $cigar = Cigar::selectRaw('cigars.id id, cigars.barcode barcode, cigars.name name, cigar_sizes.name Vitola, cigars.netWeight netWeight, cigars.unitsInPresentation unitsInPresentation, brand_groups.id Brand_Groups_ID, brand_groups.name  Linea, unit_of_measurements.name Unidad ')
                ->join('brand_groups','cigars.brand_groups_id', '=','brand_groups.id')
                ->join('unit_of_measurements', 'cigars.unit_of_measurements_id','=', 'unit_of_measurements.id')
                ->join('cigar_sizes', 'cigars.cigar_sizes_id', '=', 'cigar_sizes.id')
                ->where('cigars.active', '=', '1')
                ->get()
                ->toArray();

        }

        //dd($cigar);

        //$cigars = Cigar::latest()->active()->get();
        return view('cigars.index', compact('cigar'));
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





    public function store(CigarFormRequest $request, BrandGroup $brandGroup){



//        $cigar = new Cigar($request->all());
//        $cigar->save();

        Cigar::create($request->all());


        flash()->overlay('Your cigar has been created!', 'Good Job');
        return Redirect::to('cigars');

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



        //$categoryProduct = CategoryProduct::pluck('categoria', 'id');
        $categoryProduct = CategoryProduct::where('id', '=', 1)->pluck('categoria', 'id');
        $selectedCategory = $cigar->category_products_id;



        //dd($categoryProduct);

        //dd($brand_group);
       return view('cigars.edit', compact('cigar', 'brand_group','selectedBrand', 'units_of_measurements', 'selectedUnit', 'cigarSizes', 'selectedSize', 'categoryProduct','selectedCategory'));


    }

    public function update(Cigar $cigar, CigarFormRequest $request){
        //$article = Article::findOrFail($id);
        $cigar->update($request->all());
        //$article->tags()->sync($request->input('tag_list'));
        //$this->syncTags($article, $request->input('tag_list'));
        return Redirect::to('cigars');
    }

    public function destroy($id)
    {
        $cigar = Cigar::findOrFail($id);

        $cigar-> active = '0';

        $cigar->update();

       // Session::flash('flash_message', 'cigar_size deleted!');

        return redirect('cigars');
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
