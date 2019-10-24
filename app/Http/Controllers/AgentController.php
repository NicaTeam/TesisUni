<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Agent;
use SalesProgram\Company;
use SalesProgram\Country;
use Illuminate\Http\Request;
use Session;

class AgentController extends Controller
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
            $agent = Agent::where('name', 'LIKE', "%$keyword%")
				->orWhere('country_id', 'LIKE', "%$keyword%")
				->orWhere('shippingAddress', 'LIKE', "%$keyword%")
				->orWhere('telephone', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('contact_name', 'LIKE', "%$keyword%")
				->orWhere('company_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $agent = Agent::paginate($perPage);
        }

        return view('agent.index', compact('agent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

         $countries = Country::all();

         $companyCliente = Company::where('company_types_id','=', 1)->get(); // El id =1 es el id de los clientes

        return view('agent.create', compact('companyCliente', 'countries'));
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
            'country_id' => 'required|numeric',
            'shippingAddress' => 'required|max:250',
            'telephone' => 'required',
            'email'=>  'required|email|unique:agents',
            'contact_name'=>'required|max:250',
            'company_id'=> 'required|numeric',

        ]);
        
        $requestData = $request->all();
        
        Agent::create($requestData);

        Session::flash('flash_message', 'Agent added!');

        return redirect('agent');
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
        $agent = Agent::findOrFail($id);

        return view('agent.show', compact('agent'));
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
        $agent = Agent::findOrFail($id);
        $companies = Company::where('company_types_id', 1)->pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $selectedCountry = $agent->country->id; 
        $selectedCompany = $agent->company->id;
       

        return view('agent.edit', compact('agent','companies', 'selectedCompany', 'countries', 'selectedCountry'));
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
        
        $agent = Agent::findOrFail($id);
        $agent->update($requestData);

        Session::flash('flash_message', 'Agent updated!');

        return redirect('agent');
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
        Agent::destroy($id);

        Session::flash('flash_message', 'Agent deleted!');

        return redirect('agent');
    }
}
