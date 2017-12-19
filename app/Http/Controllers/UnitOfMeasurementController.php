<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\UnitOfMeasurement;

class UnitOfMeasurementController extends Controller
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
            $unitOfMeasurement = UnitOfMeasurement::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $unitOfMeasurement = UnitOfMeasurement::paginate($perPage);
        }

        return view('unit-of-measurement.index', compact('unitOfMeasurement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('unit-of-measurement.create');
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

        UnitOfMeasurement::create($requestData);

        //Session::flash('flash_message', 'Company added!');

        return redirect('company');
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
        $unitOfMeasurement = UnitOfMeasurement::findOrFail($id);

        return view('unit-of-measurement.show', compact('unitOfMeasurement'));
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
        $unitOfMeasurement = UnitOfMeasurement::findOrFail($id);

        return view('unit-of-measurement.edit', compact('unitOfMeasurement'));
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

        $unitOfMeasurement = UnitOfMeasurement::findOrFail($id);
        $unitOfMeasurement->update($requestData);

       // Session::flash('flash_message', 'Company updated!');

        return redirect('company');
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
        UnitOfMeasurement::destroy($id);

        Session::flash('flash_message', 'Company deleted!');

        return redirect('company');
    }
}
