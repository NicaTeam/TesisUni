<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\Cigar;
use Illuminate\Support\Facades\Redirect;
use SalesProgram\BrandGroup;
use SalesProgram\UnitOfMeasurement;
use SalesProgram\CigarSize;
use SalesProgram\Http\Requests\CigarFormRequest;
use DB;

class CigarController extends Controller
{




    public function index(){
//        //$articles = DB::table('articles')->latest()->get();
//        $articles = Article::latest('published_at')->Published()->get();
//        //return view('Pages.articles', compact('articles'));
//
//        $latest = Article::latest()->first();
//        //return view('Articles.index')->with('articles', $articles);
//        return view('Articles.index', compact('articles', 'latest'));

        //$cigars = Cigar::all();

        $cigars = Cigar::latest()->active()->get();
        return view('cigars.index', compact('cigars'));

    }




    public function show(Cigar $cigar){

//    	$article = Article::findOrFail($id);

        //dd($article->published_at->diffForHumans());
        return view('cigars.show', compact('cigar'));

    }





    public function create(){

        $brandGroups = BrandGroup::all();
        $unitOfMeasurements = UnitOfMeasurement::all();
        $cigarSizes = CigarSize::all();
        return view('cigars.create',['brandGroups'=>$brandGroups, 'unitOfMeasurements'=> $unitOfMeasurements, 'cigarSizes' => $cigarSizes]);
    }





    public function store(CigarFormRequest $request, BrandGroup $brandGroup){



//        $cigar = new Cigar($request->all());
//        $cigar->save();

        Cigar::create($request->all());


        flash()->overlay('Your cigar has been created!', 'Good Job');
        return Redirect::to('cigars');

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
