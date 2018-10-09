<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\VueTask;

class VueTaskController extends Controller
{
    public function index()
    {
       // $tasks = VueTask::get();

        // return $tasks;

        return view('testVue.index');
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
        
        $task = VueTask::findOrFail($id);


        return $task;
       // return view('bonchero.edit', compact('bonchero'));
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
       $tasks = VueTask::findOrFail(id);

       $tasks->delete();
    }
}
