<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\Title;
use SalesProgram\Person;
use Session;

class Person2Controller extends Controller
{

    public function show($id)
    {
        $person = Person::findOrFail($id);

        return view('person.show2', compact('person'));
    }


    public function edit($id)
    {
        $titles = Title::pluck('name', 'id');

        $person = Person::findOrFail($id);

        $selectedTitle = $person->titles_id;

        return view('person.edit2', compact('person', 'titles', 'selectedTitle'));
    }

    public function update($id, Request $request)
    {

        $requestData = $request->all();

        $person = Person::findOrFail($id);
        $person->update($requestData);

        Session::flash('flash_message', 'Person updated!');

        $company_id = $person->company_id;


        return redirect('customs-agency2/'.$company_id);
    }
}
