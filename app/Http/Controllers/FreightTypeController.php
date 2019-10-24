<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\FreightType;
use Illuminate\Http\Request;
use Session;

class FreightTypeController extends Controller
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
            $freighttype = FreightType::where('name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $freighttype = FreightType::paginate($perPage);
        }

        return view('freight-type.index', compact('freighttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('freight-type.create');
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
        
        FreightType::create($requestData);

        Session::flash('flash_message', 'FreightType added!');

        return redirect('freight-type');
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
        $freighttype = FreightType::findOrFail($id);

        return view('freight-type.show', compact('freighttype'));
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
        $freighttype = FreightType::findOrFail($id);

        return view('freight-type.edit', compact('freighttype'));
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
        
        $freighttype = FreightType::findOrFail($id);
        $freighttype->update($requestData);

        Session::flash('flash_message', 'FreightType updated!');

        return redirect('freight-type');
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
        FreightType::destroy($id);

        Session::flash('flash_message', 'FreightType deleted!');

        return redirect('freight-type');
    }
}
