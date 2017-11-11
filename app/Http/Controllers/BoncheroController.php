<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Bonchero;
use Illuminate\Http\Request;
use Session;

class BoncheroController extends Controller
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
            $bonchero = Bonchero::where('Name', 'LIKE', "%$keyword%")
				->orWhere('lastName', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('phone_Number', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $bonchero = Bonchero::paginate($perPage);
        }

        return view('bonchero.index', compact('bonchero'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bonchero.create');
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
        
        Bonchero::create($requestData);

        Session::flash('flash_message', 'Bonchero added!');

        return redirect('bonchero');
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
        $bonchero = Bonchero::findOrFail($id);

        return view('bonchero.show', compact('bonchero'));
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
        $bonchero = Bonchero::findOrFail($id);

        return view('bonchero.edit', compact('bonchero'));
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
        
        $bonchero = Bonchero::findOrFail($id);
        $bonchero->update($requestData);

        Session::flash('flash_message', 'Bonchero updated!');

        return redirect('bonchero');
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
        Bonchero::destroy($id);

        Session::flash('flash_message', 'Bonchero deleted!');

        return redirect('bonchero');
    }
}
