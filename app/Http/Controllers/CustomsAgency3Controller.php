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

class CustomsAgency3Controller extends Controller
{

    public function show($id)
    {

//        $countries = Country::all();
//        $companyCliente = Company::where('company_types_id','=', 1)->pluck('name', 'id'); // El id =1 es el id de los clientes
//        $company_types = CompanyType::where('id', '=', 3)->pluck('name', 'id');// El id =3  es el id del agente aduanero
//        $customer_types = CustomerType::pluck('clienteTipo', 'id');


        $customsAgency = Company::findOrFail($id);
        $title = Title::all();
        $company_person = Company::where('id', '=', $id)->pluck('name', 'id');

//        $customerType =$company->customerTypes->pluck('clienteTipo', 'id');

        return view('customs-agency.form4', compact('customsAgency','title', 'company_person', 'customerType'));
    }
}
