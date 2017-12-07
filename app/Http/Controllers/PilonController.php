<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Pilon;
use Illuminate\Http\Request;
use Session;

class PilonController extends Controller
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
            $pilon = Pilon::where('NameTabacco', 'LIKE', "%$keyword%")
				->orWhere('MorningTemperture', 'LIKE', "%$keyword%")
				->orWhere('AfternoonTemperture', 'LIKE', "%$keyword%")
				->orWhere('PilonNumber', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $pilon = Pilon::paginate($perPage);
        }

        return view('pilon.index', compact('pilon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pilon.create');
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
        
        Pilon::create($requestData);

        Session::flash('flash_message', 'Pilon added!');

        return redirect('pilon');
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
        $pilon = Pilon::findOrFail($id);

        return view('pilon.show', compact('pilon'));
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
        $pilon = Pilon::findOrFail($id);

        return view('pilon.edit', compact('pilon'));
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
        
        $pilon = Pilon::findOrFail($id);
        $pilon->update($requestData);

        Session::flash('flash_message', 'Pilon updated!');

        return redirect('pilon');
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
        Pilon::destroy($id);

        Session::flash('flash_message', 'Pilon deleted!');

        return redirect('pilon');
    }
}
