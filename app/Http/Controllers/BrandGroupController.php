<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\BrandGroup;
use Illuminate\Http\Request;
use Session;

class BrandGroupController extends Controller
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
            $brandgroup = BrandGroup::where('name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $brandgroup = BrandGroup::paginate($perPage);
        }

        return view('brand-group.index', compact('brandgroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('brand-group.create');
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
        
        BrandGroup::create($requestData);

        // Session::flash('flash_message', 'BrandGroup added!');

        return redirect('brand-group')->with('flash', 'Linea creada con exito!');
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
        $brandgroup = BrandGroup::findOrFail($id);

        return view('brand-group.show', compact('brandgroup'));
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
        $brandgroup = BrandGroup::findOrFail($id);

        return view('brand-group.edit', compact('brandgroup'));
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
        
        $brandgroup = BrandGroup::findOrFail($id);
        $brandgroup->update($requestData);

        Session::flash('flash_message', 'BrandGroup updated!');

        return redirect('brand-group');
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
        BrandGroup::destroy($id);

        Session::flash('flash_message', 'BrandGroup deleted!');

        return redirect('brand-group');
    }
}
