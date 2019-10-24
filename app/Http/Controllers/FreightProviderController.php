<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;
use Validator;
use SalesProgram\FreightProvider;
use Illuminate\Http\Request;
use Session;

class FreightProviderController extends Controller
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
            $freightprovider = FreightProvider::where('name', 'LIKE', "%$keyword%")
				->orWhere('address', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('telephone', 'LIKE', "%$keyword%")
				->orWhere('contact_name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $freightprovider = FreightProvider::paginate($perPage);
        }

        return view('freight-provider.index', compact('freightprovider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('freight-provider.create');
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


        $this->validate($request, [

            'name' => 'required|max:50',
            'address' => 'required|max:100',
            // 'email'=>  'email|unique:freight_prividers',
            'telephone'=>'required|max:25',
            'contact_name'=> 'required|max:50',

        ]);
        
        $requestData = $request->all();
        
        FreightProvider::create($requestData);

        // Session::flash('flash_message', 'FreightProvider added!');

        return redirect('freight-provider')->with('flash', 'Proveedor de flete agregado exitosamente!');
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
        $freightprovider = FreightProvider::findOrFail($id);

        return view('freight-provider.show', compact('freightprovider'));
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
        $freightprovider = FreightProvider::findOrFail($id);

        return view('freight-provider.edit', compact('freightprovider'));
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
        
        $freightprovider = FreightProvider::findOrFail($id);
        $freightprovider->update($requestData);

        Session::flash('flash_message', 'FreightProvider updated!');

        return redirect('freight-provider');
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
        FreightProvider::destroy($id);

        Session::flash('flash_message', 'FreightProvider deleted!');

        return redirect('freight-provider');
    }
}
