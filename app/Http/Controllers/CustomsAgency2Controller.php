<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\Country;
use SalesProgram\CompanyType;
Use SalesProgram\CustomerType;
use SalesProgram\CustomsAgency;
use SalesProgram\Title;
use SalesProgram\Customer;
use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;
use SalesProgram\Company;
use Session;

class CustomsAgency2Controller extends Controller
{


    public function create()
    {

        $countries = Country::all();
        $companyCliente = Company::where('company_types_id','=', 1)->pluck('name', 'id'); // El id =1 es el id de los clientes
        $company_types = CompanyType::where('id', '=', 3)->pluck('name', 'id');// El id =3  es el id del agente aduanero
        $customer_types = CustomerType::pluck('clienteTipo', 'id');

        return view('customs-agency.create', compact('companyCliente','countries', 'company_types', 'customer_types'));
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


        $cliente_id = $request->input('company_id');

        $customer_id = Customer::where('companies_id', '=', $cliente_id)->pluck('id');

        $value = $customer_id->get(0);

        $requestData = $request->all();

        $company = Company::create($requestData);


        $agency = new CustomsAgency();
        $agency->company_id = $company->id;
        $agency->customer_id = $value;
        $agency->save();

//        $this->syncCustomerType($company, $request->input('customer_type_list'));

        Session::flash('flash_message', 'Company added!');

        return redirect('customs-agency');
    }




    public function edit($id)
    {
        $countries = Country::pluck('name', 'id');
        $company = Company::findOrFail($id);
        $selectedCountry = $company->country_id;

        $company_type = CompanyType::where('id', '=', 3)->pluck('name', 'id');// EL id = 3 representa el agente aduanero
        $selectedCompanyType = $company->company_types_id;

        $customer_type = CustomerType::pluck('clienteTipo', 'id');
        $selectedCustomerType =$company->customerTypes;

        //dd($selectedCustomerType);

        return view('customs-agency.edit2', compact('company', 'countries', 'selectedCountry', 'company_type', 'selectedCompanyType', 'customer_type', 'selectedCustomerType'));
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

        $company = Company::findOrFail($id);
        $company->update($requestData);

//        $this->syncCustomerType($company, $request->input('customer_types_list'));

        Session::flash('flash_message', 'Company updated!');

        return redirect('customs-agency2/'.$company->id);
    }


//    private function syncCustomerType(Company $company, array $customer_types){
//
//
//        $company->customerTypes()->sync($customer_types);
//
//    }
}
