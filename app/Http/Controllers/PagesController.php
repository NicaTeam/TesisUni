<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
//    public function About (){
//
//    	$people = [
//    	'Henry Pineda', 'Deybin Guzman', 'Liga Torrez'
//
//    	];
//
//    	return view('Pages.About')->with([
//
//    		'name' =>'Henry',
//
//    		'last' =>'Pineda',
//
//    		'people'=> $people
//    		]);
//
//    }


    public function about(){

        $people = [ 'Henry Pineda', 'Deybin Guzman', 'Ligia Torrez'];

        return view('Pages.about')->with([ 'name'=> 'Henry', 'last' => 'Pineda', 'people'=> $people]);
    }




    public function Contact(){

    	return view('Pages.contact');
    }
}
