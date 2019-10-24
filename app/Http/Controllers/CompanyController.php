<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\CompanyType;
use SalesProgram\Country;
use SalesProgram\PaymentTerm;
use SalesProgram\Title;
use SalesProgram\Customer;
use SalesProgram\CustomerType;
use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;
use SalesProgram\Http\Requests\CompanyFormRequest;
use SalesProgram\Company;
use Illuminate\Http\Request;
use Session;
use SalesProgram\Filters\CompanyFilters;
use SalesProgram\Incoterm;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, CompanyFilters $filters)
    {

        $company = $this->getCompany($filters);
        $countries = Country::all();


    //     $keyword = $request->get('search');
    //     $perPage = 25;

    //     if (!empty($keyword)) {
    //         $company = Company::where('company_types_id', '=', 1)// company_type 1 is el Cliente, 2 Fabrica 3 Agente aduanero.
    //             ->orWhere('name', 'LIKE', "%$keyword%")
				// ->orWhere('countries_id', 'LIKE', "%$keyword%")
				// ->orWhere('company_types_id', 'LIKE', "%$keyword%")
				// ->orWhere('shippingAddress', 'LIKE', "%$keyword%")
				// ->orWhere('telephone', 'LIKE', "%$keyword%")
				// ->paginate($perPage);
    //     } else {
    //         $company = Company::where('company_types_id', '=', 1)
    //         ->paginate($perPage);
    //     }



        return view('company.index', compact('company', 'countries'));
    }

    protected function getCompany($filters)
    {

        $company = Company::where('company_types_id', 1)->filter($filters);

        $company = $company->paginate(2);

        return $company;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $countries = Country::all();
        $company_types = CompanyType::where('name', '=', 'Cliente')->pluck('name', 'id');
        $customer_types = CustomerType::pluck('clienteTipo', 'id');
        $paymentTerm = PaymentTerm::all();
        $incoterm = incoterm::all();

        return view('company.create', compact('countries', 'company_types', 'customer_types', 'paymentTerm', 'incoterm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CompanyFormRequest $request)
    {

        //dd($request);
        
        $requestData = $request->all();

        // dd($requestData);
        
        $company = Company::create($requestData);


        $customer = new Customer;
        $customer->companies_id = $company->id;
        $customer->save();

        //$this->syncCustomerType($company, $request->input('customer_type_list'));

        // Session::flash('flash_message', 'Company added!');

        return redirect('company')->with('flash', 'Compañia cliente creada correactamente!');
    }

    private function syncCustomerType(Company $company, array $customer_types){


        $company->customerTypes()->sync($customer_types);

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
        $company = Company::findOrFail($id);
        $title = Title::all();
        $company_person = Company::where('id', '=', $id)->pluck('name', 'id');

        $customerType =$company->customertype->pluck('clienteTipo', 'id');

        // dd($customerType);

//        $country = $company->country()->name;

//        $Country = Company::selectRaw('countries.name')
//                ->join('countries','companies.countries_id', '=','countries.id')
//                ->join('unit_of_measurements', 'cigars.unit_of_measurements_id','=', 'unit_of_measurements.id')
//                ->join('cigar_sizes', 'cigars.cigar_sizes_id', '=', 'cigar_sizes.id')
//                ->where('cigars.active', '=', '1')
//                ->get()
//                ->toArray();


        return view('company.show', compact('company', 'title', 'company_person', 'customerType'  ));
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
        $selectedCountry = $company->countries_id;

        $company_type = CompanyType::where('name', '=', 'Cliente')->pluck('name', 'id');
        $selectedCompanyType = $company->company_types_id;

        $customer_type = CustomerType::pluck('clienteTipo', 'id');
        $selectedCustomerType =$company->customerTypes;

        $payment_term = PaymentTerm::pluck('name', 'id');
        $selectedPaymentTerm = $company->payment_term_id;

        $incoterm = Incoterm::pluck('name', 'id');
        $selectedIncoterm = $company->incoterm_id;

        //dd($selectedCustomerType);

        return view('company.edit', compact('company', 'countries', 'selectedCountry', 'company_type', 'selectedCompanyType', 'customer_type', 'selectedCustomerType', 'payment_term', 'selectedPaymentTerm', 'incoterm', 'selectedIncoterm'));
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

        // dd($request);
        $company = Company::findOrFail($id);
        $this->validate($request,[

            'countries_id' => 'required|numeric',

            'company_types_id' => 'required|numeric',

            'payment_term_id' => 'required|numeric',

            'customer_type_id' => 'required|numeric',

            'incoterm_id' => 'required|numeric',

            'name' => 'required|max:255|unique:companies,name,'.$company->id,

            'shippingAddress' => 'required|max:255',

            'telephone' => 'required',

        ]);
        $requestData = $request->all();

        // dd($requestData);
        
//        $company = Company::findOrFail($id);
        $company->update($requestData);

        //$this->syncCustomerType($company, $request->input('customer_types_list'));

        // Session::flash('flash_message', 'Company updated!');

        return redirect('company')->with('flash', 'Compañía actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    // public function destroy(Company $company)
    // {
    //     // Company::destroy($id);

    //     $company->update([

    //     ]);

    //     // Session::flash('flash_message', 'Company deleted!');

    //     return redirect('company')->with('flash', 'Cliente ha sido deshabilidato!');
    // }
}
