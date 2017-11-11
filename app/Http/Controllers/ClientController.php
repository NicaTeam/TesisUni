<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Client;
use Illuminate\Http\Request;
use Session;

class ClientController extends Controller
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
            $client = Client::where('Name', 'LIKE', "%$keyword%")
				->orWhere('lastName', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('phoneNumber', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $client = Client::paginate($perPage);
        }

        return view('client.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('client.create');
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
        
        Client::create($requestData);

        Session::flash('flash_message', 'Client added!');

        return redirect('client');
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
        $client = Client::findOrFail($id);

        return view('client.show', compact('client'));
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
        $client = Client::findOrFail($id);

        return view('client.edit', compact('client'));
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
        
        $client = Client::findOrFail($id);
        $client->update($requestData);

        Session::flash('flash_message', 'Client updated!');

        return redirect('client');
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
        Client::destroy($id);

        Session::flash('flash_message', 'Client deleted!');

        return redirect('client');
    }
}
