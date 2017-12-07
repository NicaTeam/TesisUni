<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;


class CigarSizeController extends Controller
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
            $cigar_size = CigarSize::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $cigar_size = CigarSize::paginate($perPage);
        }

        return view('cigar_size.index', compact('cigar_size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cigar_size.create');
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

        CigarSize::create($requestData);

        Session::flash('flash_message', 'cigar_size added!');

        return redirect('cigar_size');
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
        $cigar_size = CigarSize::findOrFail($id);

        return view('cigar_size.show', compact('cigar_size'));
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
        $cigar_size = CigarSize::findOrFail($id);

        return view('cigar_size.edit', compact('cigar_size'));
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

        $cigar_size = CigarSize::findOrFail($id);
        $cigar_size->update($requestData);

        Session::flash('flash_message', 'cigar_size updated!');

        return redirect('cigar_size');
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
        CigarSize::destroy($id);

        Session::flash('flash_message', 'cigar_size deleted!');

        return redirect('cigar_size');
    }
}
