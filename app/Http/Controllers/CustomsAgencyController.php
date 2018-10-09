<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\CustomsAgency;
use Illuminate\Http\Request;
use SalesProgram\Company;
use SalesProgram\CompanyType;
use SalesProgram\CustomerType;
use SalesProgram\Customer;
use SalesProgram\Title;
use SalesProgram\Country;
use Validator;
use Session;
use SalesProgram\Filters\AgencyFilters;

class CustomsAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, AgencyFilters $filters)
    {
    //     $keyword = $request->get('search');
    //     $perPage = 25;

    //     if (!empty($keyword)) {
    //         $customsagency = CustomsAgency::where('company_id', 'LIKE', "%$keyword%")
				// ->orWhere('customer_id', 'LIKE', "%$keyword%")
				// ->paginate($perPage);
    //     } else {
    //         $customsagency = CustomsAgency::paginate($perPage);
    //     }



        $customsagency = $this->getAgency($filters);

        if(empty($customsagency)){

            $customsagency = CustomsAgency::all();
        }

        return view('customs-agency.index', compact('customsagency'));
    }

    protected function getAgency($filters)
    {

        // $company = Company::where('company_types_id', 3)->filter($filters);

        // $company = $company->paginate(2);

        $CustomsAgency = CustomsAgency::latest()->filter($filters);

        $CustomsAgency = $CustomsAgency->paginate(2);

        return $CustomsAgency;


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

        // dd($companyCliente);
        $company_types = CompanyType::where('id', '=', 3)->pluck('name', 'id');// El id =3  es el id del agente aduanero
        $customer_types = CustomerType::pluck('clienteTipo', 'id');
        return view('customs-agency.create', compact('countries', 'companyCliente', 'company_types', 'customer_types'));
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

            'company_id' => 'required|integer',
            'name'       => 'required|max:255|unique:companies',
            'countries_id'=> 'required|integer',
            'shippingAddress'=> 'required|max:255',
            'telephone'=> 'required|max:255'

        ]);

        $cliente_id = $request->input('company_id');

        $customer_id = Customer::where('companies_id', '=', $cliente_id)->pluck('id');

        $value = $customer_id->get(0);

        $requestData = $request->all();

        $company = Company::create($requestData);


        $agency = new CustomsAgency();
        $agency->company_id = $company->id;
        $agency->customer_id = $value;
        $agency->save();

        return redirect('customs-agency')->with('flash', 'Agente aduanero creado exitosamente!');
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
        

        $countries = Country::pluck('name', 'id');
        $company = Company::findOrFail($id);
        $customsagency = $company->customsAgency;
        $agency = $customsagency[0]->id;
        $agente = CustomsAgency::find($agency);
        $selectedCountry = $company->country->id;
        $company_type = CompanyType::where('id', '=', 3)->pluck('name', 'id');// EL id = 3 representa el agente aduanero
        $selectedCompanyType = $company->company_types_id;
        $customer_type = CustomerType::pluck('clienteTipo', 'id');
        $selectedCustomerType =$company->customerTypes;
        $customers = Company::where('company_types_id', 1)->pluck('name', 'id'); 
        $selectedCustomer = $agente->customer->companies_id;


        return view('customs-agency.edit', compact('company', 'countries', 'selectedCountry', 'company_type', 'selectedCompanyType', 'customer_type', 'selectedCustomerType', 'customers', 'selectedCustomer'));
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
        $company = Company::findOrFail($id);

         $this->validate($request, [

            'customer_id' => 'required|integer',
            'name'       => 'required|max:255|unique:companies,name,'. $company->id,
            'countries_id'=> 'required|integer',
            'shippingAddress'=> 'required|max:255',
            'telephone'=> 'required|max:255'

        ]);

        $cliente_id = $request->input('customer_id');

        $customer_id = Customer::where('companies_id', '=', $cliente_id)->pluck('id');
        
        $requestData = $request->all();
        
        $company = Company::findOrFail($id);

        $company->update($requestData);

        $company->customsAgency()->update([ 'customer_id' => $customer_id[0]]);


        return redirect('customs-agency')->with('flash', 'Agente aduanero actualizado correctamente!');
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
