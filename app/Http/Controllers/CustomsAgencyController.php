<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\CustomsAgency;
use Illuminate\Http\Request;
use SalesProgram\Company;
use SalesProgram\Customer;
use SalesProgram\Title;
use Session;

class CustomsAgencyController extends Controller
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
            $customsagency = CustomsAgency::where('company_id', 'LIKE', "%$keyword%")
				->orWhere('customer_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $customsagency = CustomsAgency::paginate($perPage);
        }

        return view('customs-agency.index', compact('customsagency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customs-agency.create');
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
        
        CustomsAgency::create($requestData);

        Session::flash('flash_message', 'CustomsAgency added!');

        return redirect('customs-agency');
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

        $customsAgency = Company::findOrFail($id);

        $title = Title::all();

        $company_person = Company::where('id', '=', $id)->pluck('name', 'id');


//        $customsagency = CustomsAgency::where('company_id', '=', $id)->pluck('customer_id');
//        $company_id = Customer::where('id', '=', $customsagency)->pluck('companies_id');
//        $value = $company_id->get(0);

//        $customer_id = $customsagency->flatten(1); $customer_id->values()->all(); $value = $customsagency->get('customer_id'); dd($customsagency); $CompanyAgent = Company::findOrFail($customsagency)->pluck('name', 'id'); $customerId = CustomsAgency::where('company_id', '=', $id)->pluck('id'); $company_id = Customer::where('id', '=', $customerId)->pluck('companies_id'); $company = Company::findOrFail($company_id);



        return view('customs-agency.show', compact('customsAgency', 'title', 'company_person'));
    }

    public function show2($id)
    {

        $CompanyAgent = Company::findOrFail($id);


        $customsagency = CustomsAgency::where('company_id', '=', $id)->pluck('customer_id');
        $company_id = Customer::where('id', '=', $customsagency)->pluck('companies_id');
        $value = $company_id->get(0);


        return view('customs-agency.show2', compact('CompanyAgent', 'value'));
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
        $customsagency = CustomsAgency::findOrFail($id);

        return view('customs-agency.edit', compact('customsagency'));
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
        
        $customsagency = CustomsAgency::findOrFail($id);
        $customsagency->update($requestData);

        Session::flash('flash_message', 'CustomsAgency updated!');

        return redirect('customs-agency');
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
        CustomsAgency::destroy($id);

        Session::flash('flash_message', 'CustomsAgency deleted!');

        return redirect('customs-agency');
    }
}
