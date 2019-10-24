<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SalesProgram\Http\Requests\PriceRegistrationFormRequest;
use SalesProgram\Http\Requests\PriceRegistrationDetailFormRequest;
use SalesProgram\PriceRegistrationDetail;
use SalesProgram\PriceRegistration;
use Illuminate\Http\Request;
use SalesProgram\Cigar;
use SalesProgram\UnitOfMeasurement;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use SalesProgram\CustomerType;

use Session;

class PriceRegistrationController extends Controller
{


    public function __construct(){
//        $this->middleware('auth', ['only' => 'create']);
        $this->middleware('auth', ['except' => 'index']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 2;

        if (!empty($keyword)) {
            $priceregistration = PriceRegistration::where('validPeriod', 'LIKE', "%$keyword%")
				->orWhere('active', '=', 1)
				->paginate($perPage);
        } else {
             $priceregistration = PriceRegistration::where('active', '=', 1)
             ->paginate($perPage);

            // $priceregistration = PriceRegistration::where('active', '=', 1);
        }

        return view('price-registration.index', compact('priceregistration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $cigars = Cigar::where('active', '=', 1)->get();

        $customerTypes = CustomerType::all();

        $priceRegistrationActive =1;
        $detailActive=1;


        return view('price-registration.create', compact('cigars', 'customerTypes','priceRegistrationActive', 'detailActive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PriceRegistrationFormRequest $request, PriceRegistrationDetailFormRequest $request2)
    {

          // dd($request);


        try{

            DB::beginTransaction();

//                $PriceRegistrationData = $request->all();
//                $DetailData = $request2->all();
//                $PriceRegistration = auth()->user()->addRegister(new PriceRegistration($PriceRegistrationData));

                $PriceRegistration = new PriceRegistration;
                $PriceRegistration->user_id= auth()->user()->id;
                $PriceRegistration->validPeriod= $request->get('validPeriod');
                $PriceRegistration->active= 1;
                $PriceRegistration->save();





                $cigar_id = $request->get('cigar_id');
                $customer_type_id= $request->get('customer_type_id');
                $price= $request->get('price');
                $active= 1;


                $cont =0;

            while($cont < count($cigar_id)){


//                $PriceRegistrationDetail = $PriceRegistration()->addDetail(new PriceRegistrationDetail($DetailData));

                $PriceRegistrationDetail = new PriceRegistrationDetail();
                $PriceRegistrationDetail->price_registration_id = $PriceRegistration->id;
                $PriceRegistrationDetail->cigar_id= $cigar_id[$cont];
                $PriceRegistrationDetail->customer_type_id = $customer_type_id[$cont];
                $PriceRegistrationDetail->price = $price[$cont];
                $PriceRegistrationDetail->active= $active;
                $PriceRegistrationDetail->save();

                $cont= $cont+1;


            }

//                PriceRegistrationDetail::create($requestData2);

            DB::commit();




        }catch (\Exception $e)
        {

            DB::rollback();
        }


        // Session::flash('flash_message', 'PriceRegistration added!');

        Session()->flash('flash_message', 'Lista de precios guardada correctamente!');

        return redirect('price-registration');
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
        $priceregistration = PriceRegistration::findOrFail($id);

        // $price_registration = PriceRegistration::where('id', '=', $id)->pluck('validPeriod', 'id');

        $price_registration = PriceRegistration::where('id', '=', $id)->get();

        $cigars = Cigar::where('active', '=', 1)->get();

        $customerTypes = CustomerType::all();

//        $PriceRegistrationDetail = PriceRegistrationDetail::where('price_registration_id', '=', $id)->get();

//        $PriceRegistrationDetail = PriceRegistrationDetail::findOrFail(::where('price_registration_id', '=', $id));
//
//       dd($PriceRegistrationDetail);

        return view('price-registration.show', compact('priceregistration','price_registration', 'cigars', 'customerTypes'));
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

        $priceregistration = PriceRegistration::findOrFail($id);

        // dd($priceregistration);

        $cigars = Cigar::where('active', '=', 1)->get();

        $customerTypes = CustomerType::all();

        $distributortype = CustomerType::where('id', '>', 0)->get();

        // dd($cigars);

        // dd($priceregistration->priceRegistrationDetails);

        return view('price-registration.edit', compact('priceregistration', 'cigars', 'customerTypes', 'distributortype'));
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

        try{

            DB::beginTransaction();


            $priceregistration = PriceRegistration::findOrFail($id);

            $priceregistration->update([

                'validPeriod' => $request->get('validPeriod'),

            ]);

            $cigar_id = $request->get('cigar_id');
            $customer_type_id = $request->get('customer_type_id');
            $price = $request->get('price');
            $active = 1;


            $priceregistration->priceRegistrationDetails()->delete();


            $cont = 0;

            while ($cont < count($cigar_id)){

                $priceregistration->priceRegistrationDetails()->create([

                    'cigar_id' => $cigar_id[$cont],
                    'customer_type_id' => $customer_type_id[$cont],
                    'price' => $price[$cont],
                    'active' => $active,

                ]);
                
                $cont = $cont + 1;
            }

            DB::commit();


        }catch(\Exception $e)
        {


            DB::rollback();

        }


        // $requestData = $request->all();
        
        // $priceregistration = PriceRegistration::findOrFail($id);
        // $priceregistration->update($requestData);

        // Session::flash('flash_message', 'PriceRegistration updated!');

        return redirect('price-registration')->with('flash', 'Lista de precios actualizada exitosamente!');
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
        try{

            DB::beginTransaction();

                $priceregistration = PriceRegistration::findOrFail($id);

                $priceregistrationDetails = PriceRegistrationDetail::where('price_registration_id', '=', $id)->get();

                foreach ($priceregistrationDetails as $detail) {

                    $detail->active = 0;

                    $detail->update();
                    
                }

                $priceregistration->active = 0;

                $priceregistration->update();

            DB::commit();


        }catch (\Exception $e)
        {

            DB::rollback();
        }

        return redirect('price-registration');
    }
}
