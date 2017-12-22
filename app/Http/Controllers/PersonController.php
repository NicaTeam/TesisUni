<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;
use SalesProgram\Http\Requests\PersonFormRequest;
use SalesProgram\Person;
use SalesProgram\Company;
use Illuminate\Http\Request;
use SalesProgram\Title;
use Session;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $person = Person::where('name', 'LIKE', "%$keyword%")
				->orWhere('title', 'LIKE', "%$keyword%")
				->orWhere('lastName', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('telephone', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $person = Person::paginate($perPage);
        }

        return view('person.index', compact('person'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Person::create($requestData);

        Session::flash('flash_message', 'Person added!');

        return redirect('person');
    }



    public function store2(PersonFormRequest $request){

        $requestData = $request->all();
        Person::create($requestData);

        return back();


    }


    public function store3(PersonFormRequest $request){


        $agency_id = $request->input('company_id');
        $requestData = $request->all();
        Person::create($requestData);



        //return back();

        return redirect('customs-agency2/'.$agency_id);


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $person = Person::findOrFail($id);

        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $titles = Title::pluck('name', 'id');

        $person = Person::findOrFail($id);

        $selectedTitle = $person->titles_id;

        return view('person.edit', compact('person', 'titles', 'selectedTitle'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $person = Person::findOrFail($id);
        $person->update($requestData);

        Session::flash('flash_message', 'Person updated!');

        $company_id = $person->company_id;


       return redirect('company/'.$company_id);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Person::destroy($id);

        Session::flash('flash_message', 'Person deleted!');

        return redirect('person');
    }
}
