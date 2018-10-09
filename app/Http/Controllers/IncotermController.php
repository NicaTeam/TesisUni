<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Incoterm;
use Illuminate\Http\Request;
use Validator;
use Session;

class IncotermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $incoterm = Incoterm::where('name', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $incoterm = Incoterm::paginate($perPage);
        }

        return view('incoterm.index', compact('incoterm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('incoterm.create');
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

        $this->validate($request, [

            'name' => 'required|max:255|unique:incoterms',
            'description' => 'required'


        ]);
        
        $requestData = $request->all();
        
        Incoterm::create($requestData);

        // Session::flash('flash_message', 'Incoterm added!');

        return redirect('incoterm')->with('flash', 'Termino de comercio internacional creado exitosamente!');
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
        $incoterm = Incoterm::findOrFail($id);

        return view('incoterm.show', compact('incoterm'));
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

        $incoterm = Incoterm::findOrFail($id);

        return view('incoterm.edit', compact('incoterm'));
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

        $this->validate($request, [

            'name' => 'required|max:255|unique:incoterms,name,'.$id,
            'description' => 'required'


        ]);

        
        $requestData = $request->all();
        
        $incoterm = Incoterm::findOrFail($id);
        $incoterm->update($requestData);

        // Session::flash('flash_message', 'Incoterm updated!');

        return redirect('incoterm')->with('flash', 'Termino de comercio internacional actualizado exitosamente!');
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
        // Incoterm::destroy($id);

        // Session::flash('flash_message', 'Incoterm deleted!');

        // return redirect('incoterm');
    }
}
