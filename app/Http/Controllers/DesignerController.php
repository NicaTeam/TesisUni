<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Designer;
use Illuminate\Http\Request;
use Session;

class DesignerController extends Controller
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
            $designer = Designer::where('Name', 'LIKE', "%$keyword%")
				->orWhere('lastName', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('phone_Number', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $designer = Designer::paginate($perPage);
        }

        return view('designer.index', compact('designer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('designer.create');
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
        
        Designer::create($requestData);

        Session::flash('flash_message', 'Designer added!');

        return redirect('designer');
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
        $designer = Designer::findOrFail($id);

        return view('designer.show', compact('designer'));
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
        $designer = Designer::findOrFail($id);

        return view('designer.edit', compact('designer'));
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
        
        $designer = Designer::findOrFail($id);
        $designer->update($requestData);

        Session::flash('flash_message', 'Designer updated!');

        return redirect('designer');
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
        Designer::destroy($id);

        Session::flash('flash_message', 'Designer deleted!');

        return redirect('designer');
    }
}
