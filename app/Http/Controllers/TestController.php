<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Test;
use Illuminate\Http\Request;
use Session;

class TestController extends Controller
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
            $test = Test::where('title', 'LIKE', "%$keyword%")
				->orWhere('body', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $test = Test::paginate($perPage);
        }

        return view('test.index', compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('test.create');
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
        
        Test::create($requestData);

        Session::flash('flash_message', 'Test added!');

        return redirect('test');
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
        $test = Test::findOrFail($id);

        return view('test.show', compact('test'));
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
        $test = Test::findOrFail($id);

        return view('test.edit', compact('test'));
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
        
        $test = Test::findOrFail($id);
        $test->update($requestData);

        Session::flash('flash_message', 'Test updated!');

        return redirect('test');
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
        Test::destroy($id);

        Session::flash('flash_message', 'Test deleted!');

        return redirect('test');
    }
}
