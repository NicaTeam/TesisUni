<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Storage;
use Storage;
use Validator;
use SalesProgram\Order;
use SalesProgram\Company;
use SalesProgram\Cigar;
use SalesProgram\PriceRegistrationDetail;
use Illuminate\Http\Request;
use DB;
use Session;
use SalesProgram\User;

class OrderController extends Controller
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
            $order = Order::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('reference', 'LIKE', "%$keyword%")
				->orWhere('company_id', 'LIKE', "%$keyword%")
				->orWhere('company_name', 'LIKE', "%$keyword%")
				->orWhere('company_shipping_addres', 'LIKE', "%$keyword%")
				->orWhere('company_contact_name', 'LIKE', "%$keyword%")
				->orWhere('company_contact_email', 'LIKE', "%$keyword%")
				->orWhere('company_contact_telephone', 'LIKE', "%$keyword%")
				->orWhere('payment_term_name', 'LIKE', "%$keyword%")
				->orWhere('incoterm_name', 'LIKE', "%$keyword%")
				->orWhere('customs_agency_name', 'LIKE', "%$keyword%")
				->orWhere('customs_agency_shipping_address', 'LIKE', "%$keyword%")
				->orWhere('customs_agency_contact_name', 'LIKE', "%$keyword%")
				->orWhere('customs_agency_contact_email', 'LIKE', "%$keyword%")
				->orWhere('customs_agency_contact_telephone', 'LIKE', "%$keyword%")
				->orWhere('total_net_weight_in_grams', 'LIKE', "%$keyword%")
				->orWhere('total_boxes', 'LIKE', "%$keyword%")
				->orWhere('total_packs', 'LIKE', "%$keyword%")
				->orWhere('total_cigars', 'LIKE', "%$keyword%")
				->orWhere('amount_order_total', 'LIKE', "%$keyword%")
				->orWhere('amount_due', 'LIKE', "%$keyword%")
				->orWhere('raw_order_file', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $order = Order::paginate($perPage);
        }



        return view('order.index', compact('order'));
    }


    public function customerindex()
    {

        // dd(auth()->id());

        $usuarioId = auth()->id();

        $usuario = User::findOrFail($usuarioId);

        // dd($usuario->company->orders);

        $order = $usuario->company->orders()->get();

        // dd($order);


        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $order = Order::where('user_id', 'LIKE', "%$keyword%")
        //         ->orWhere('reference', 'LIKE', "%$keyword%")
        //         ->orWhere('company_id', 'LIKE', "%$keyword%")
        //         ->orWhere('company_name', 'LIKE', "%$keyword%")
        //         ->orWhere('company_shipping_addres', 'LIKE', "%$keyword%")
        //         ->orWhere('company_contact_name', 'LIKE', "%$keyword%")
        //         ->orWhere('company_contact_email', 'LIKE', "%$keyword%")
        //         ->orWhere('company_contact_telephone', 'LIKE', "%$keyword%")
        //         ->orWhere('payment_term_name', 'LIKE', "%$keyword%")
        //         ->orWhere('incoterm_name', 'LIKE', "%$keyword%")
        //         ->orWhere('customs_agency_name', 'LIKE', "%$keyword%")
        //         ->orWhere('customs_agency_shipping_address', 'LIKE', "%$keyword%")
        //         ->orWhere('customs_agency_contact_name', 'LIKE', "%$keyword%")
        //         ->orWhere('customs_agency_contact_email', 'LIKE', "%$keyword%")
        //         ->orWhere('customs_agency_contact_telephone', 'LIKE', "%$keyword%")
        //         ->orWhere('total_net_weight_in_grams', 'LIKE', "%$keyword%")
        //         ->orWhere('total_boxes', 'LIKE', "%$keyword%")
        //         ->orWhere('total_packs', 'LIKE', "%$keyword%")
        //         ->orWhere('total_cigars', 'LIKE', "%$keyword%")
        //         ->orWhere('amount_order_total', 'LIKE', "%$keyword%")
        //         ->orWhere('amount_due', 'LIKE', "%$keyword%")
        //         ->orWhere('raw_order_file', 'LIKE', "%$keyword%")
        //         ->paginate($perPage);
        // } else {
        //     $order = Order::paginate($perPage);
        // }



        return view('customerorder.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        // $companies = Company::all();

        $companies = Company::where('company_types_id', '=', 1)->get();

        $cigars = Cigar::where('active', '=', 1)->get();

        $prices = PriceRegistrationDetail::where('active', '=', 1)->get();

        //dd($companies);


        return view('order.create', compact('companies', 'cigars', 'prices'));
    }


    public function customercreate()
    {
        // $companies = Company::all();

        $usuarioId = auth()->id();

        $usuario = User::findOrFail($usuarioId);

        $companies = $usuario->company()->get();

        // dd($companies); 

        // $companies = Company::where('company_types_id', '=', 1)->get();

        $cigars = Cigar::where('active', '=', 1)->get();

        $prices = PriceRegistrationDetail::where('active', '=', 1)->get();

        //dd($companies);


        return view('customerorder.create', compact('companies', 'cigars', 'prices'));
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

        // dd($request);

        $this->validate($request, [

            'company_id'=> 'required',
            'reference' => 'required',
            'company_name'=> 'required|max:255',
            'company_shipping_addres'=> 'required|max:255',
            'company_contact_name'=> 'required|max:50',
            'company_contact_email'=> 'required|max:100|email',
            'company_contact_telephone'=> 'required|max:50',
            'payment_term_name'=> 'required|max:50',
            'incoterm_name'=> 'required|max:100',
            'customs_agency_name'=> 'required',
            'customs_agency_shipping_address'=> 'required|max:255',
            'customs_agency_contact_name'=> 'required|max:100',
            'customs_agency_contact_email'=>'required',
            'customs_agency_contact_telephone'=>'required',
            'total_net_weight_in_grams'=>'required|numeric',
            'total_boxes'=> 'required|integer',
            'total_packs'=> 'required|integer',
            'total_cigars'=> 'required|integer',
            'amount_order_total'=>'required|numeric',
            'amount_due'=> 'required|numeric',
            'raw_order_file'=> 'mimes:jpeg,jpg,png,pdf,xlsx',
            'grand_total'=> 'required|numeric',


        ]);


        try{

            DB::beginTransaction();

            if (Input::hasFile('raw_order_file')){

                $fileName = uniqid().'_'.Input::file('raw_order_file')->getClientOriginalName();

                $path = $request->file('raw_order_file')->storeAs('public', $fileName);

                // $file =Input::file('raw_order_file');
                // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                // $file->getClientOriginalName();

            }else{

                $filename = null;
            }

            
            $order = Order::create([

                'user_id' => auth()->id(),
                'company_id'=> $request->get('company_id'),
                'reference' => $request->get('reference'),
                'company_name'=> $request->get('company_name'),
                'company_shipping_addres'=>$request->get('company_shipping_addres'),
                'company_contact_name'=>$request->get('company_contact_name'),
                'company_contact_email'=>$request->get('company_contact_email'),
                'company_contact_telephone'=>$request->get('company_contact_telephone'),
                'payment_term_name'=>$request->get('payment_term_name'),
                'incoterm_name'=>$request->get('incoterm_name'),
                'customs_agency_name'=>$request->get('customs_agency_name'),
                'customs_agency_shipping_address'=>$request->get('customs_agency_shipping_address'),
                'customs_agency_contact_name'=>$request->get('customs_agency_contact_name'),
                'customs_agency_contact_email'=>$request->get('customs_agency_contact_email'),
                'customs_agency_contact_telephone'=>$request->get('customs_agency_contact_telephone'),
                'total_net_weight_in_grams'=>$request->get('total_net_weight_in_grams'),
                'total_boxes'=>$request->get('total_boxes'),
                'total_packs'=>$request->get('total_packs'),
                'total_cigars'=>$request->get('total_cigars'),
                'amount_order_total'=>$request->get('amount_order_total'),
                'amount_due'=>$request->get('amount_due'),
                'raw_order_file'=>$fileName,
                'shipping_quote' =>$request->get('shipping_quote'),
                'final_freight_cost' =>$request->get('final_freight_cost'),
                'grand_total'=>$request->get('grand_total'),



            ]);

            $createdStatus = 1;

            $order->statuses()->attach($createdStatus);

            if($request->get('payment_term_name') != 'Antes de envio'){

                $creditStatus =7;

                $order->statuses()->attach($creditStatus);
            }

            $cigar_id = $request->get('cigar_id');
            $cigar_barcode = $request->get('cigar_barcode');
            $brand_name = $request->get('brand_name');
            $cigar_name = $request->get('cigar_name');
            $cigar_size_name = $request->get('cigar_size_name');
            $cigar_netWeight = $request->get('cigar_netWeight');
            $quantity = $request->get('quantity');
            $cigar_unitOfMeasurement_name = $request->get('cigar_unitOfMeasurement_name');
            $cigar_unitsInPresentation = $request->get('cigar_unitsInPresentation');
            $subtotalCigars = $request->get('subTotalCigars');
            $cigar_price = $request->get('cigar_price');
            $subAmount = $request->get('subAmount');

            $cont =0;


            while ($cont < count($cigar_id)) {


                $order->details()->create([


                    'order_id' => $order->id,
                    'cigar_id' => $cigar_id[$cont],
                    'cigar_barcode' => $cigar_barcode[$cont],
                    'brand_name'=> $brand_name[$cont],
                    'cigar_name' => $cigar_name[$cont],
                    'cigar_size_name' => $cigar_size_name[$cont],
                    'cigar_netWeight' => $cigar_netWeight[$cont],
                    'quantity' => $quantity[$cont],
                    'cigar_unitOfMeasurement_name' => $cigar_unitOfMeasurement_name[$cont],
                    'cigar_unitsInPresentation' => $cigar_unitsInPresentation[$cont],
                    'subTotalCigars' => $subtotalCigars[$cont],
                    'cigar_price' => $cigar_price[$cont],
                    'subAmount' => $subAmount[$cont],

                ]);
                

                $cont = $cont + 1;
            }

            DB::commit();

        }catch (\Exception $e)
        {

            DB::rollback();
        }

        return redirect('order')->with('flash', 'Orden creada exitosamente!');
    }


    public function customerstore(Request $request)
    {

        // dd($request);

        $this->validate($request, [

            'company_id'=> 'required',
            'reference' => 'required',
            'company_name'=> 'required|max:255',
            'company_shipping_addres'=> 'required|max:255',
            'company_contact_name'=> 'required|max:50',
            'company_contact_email'=> 'required|max:100|email',
            'company_contact_telephone'=> 'required|max:50',
            'payment_term_name'=> 'required|max:50',
            'incoterm_name'=> 'required|max:100',
            'customs_agency_name'=> 'required',
            'customs_agency_shipping_address'=> 'required|max:255',
            'customs_agency_contact_name'=> 'required|max:100',
            'customs_agency_contact_email'=>'required',
            'customs_agency_contact_telephone'=>'required',
            'total_net_weight_in_grams'=>'required|numeric',
            'total_boxes'=> 'required|integer',
            'total_packs'=> 'required|integer',
            'total_cigars'=> 'required|integer',
            'amount_order_total'=>'required|numeric',
            'amount_due'=> 'required|numeric',
            'raw_order_file'=> 'mimes:jpeg,jpg,png,pdf,xlsx',
            'grand_total'=> 'required|numeric',


        ]);


        try{

            DB::beginTransaction();

            if (Input::hasFile('raw_order_file')){

                $fileName = uniqid().'_'.Input::file('raw_order_file')->getClientOriginalName();

                $path = $request->file('raw_order_file')->storeAs('public', $fileName);

                // $file =Input::file('raw_order_file');
                // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                // $file->getClientOriginalName();

            }else{

                $filename = null;
            }

            
            $order = Order::create([

                'user_id' => auth()->id(),
                'company_id'=> $request->get('company_id'),
                'reference' => $request->get('reference'),
                'company_name'=> $request->get('company_name'),
                'company_shipping_addres'=>$request->get('company_shipping_addres'),
                'company_contact_name'=>$request->get('company_contact_name'),
                'company_contact_email'=>$request->get('company_contact_email'),
                'company_contact_telephone'=>$request->get('company_contact_telephone'),
                'payment_term_name'=>$request->get('payment_term_name'),
                'incoterm_name'=>$request->get('incoterm_name'),
                'customs_agency_name'=>$request->get('customs_agency_name'),
                'customs_agency_shipping_address'=>$request->get('customs_agency_shipping_address'),
                'customs_agency_contact_name'=>$request->get('customs_agency_contact_name'),
                'customs_agency_contact_email'=>$request->get('customs_agency_contact_email'),
                'customs_agency_contact_telephone'=>$request->get('customs_agency_contact_telephone'),
                'total_net_weight_in_grams'=>$request->get('total_net_weight_in_grams'),
                'total_boxes'=>$request->get('total_boxes'),
                'total_packs'=>$request->get('total_packs'),
                'total_cigars'=>$request->get('total_cigars'),
                'amount_order_total'=>$request->get('amount_order_total'),
                'amount_due'=>$request->get('amount_due'),
                'raw_order_file'=>$fileName,
                'shipping_quote' =>$request->get('shipping_quote'),
                'final_freight_cost' =>$request->get('final_freight_cost'),
                'grand_total'=>$request->get('grand_total'),



            ]);

            $createdStatus = 1;

            $order->statuses()->attach($createdStatus);

            if($request->get('payment_term_name') != 'Antes de envio'){

                $creditStatus =7;

                $order->statuses()->attach($creditStatus);
            }

            $cigar_id = $request->get('cigar_id');
            $cigar_barcode = $request->get('cigar_barcode');
            $brand_name = $request->get('brand_name');
            $cigar_name = $request->get('cigar_name');
            $cigar_size_name = $request->get('cigar_size_name');
            $cigar_netWeight = $request->get('cigar_netWeight');
            $quantity = $request->get('quantity');
            $cigar_unitOfMeasurement_name = $request->get('cigar_unitOfMeasurement_name');
            $cigar_unitsInPresentation = $request->get('cigar_unitsInPresentation');
            $subtotalCigars = $request->get('subTotalCigars');
            $cigar_price = $request->get('cigar_price');
            $subAmount = $request->get('subAmount');

            $cont =0;


            while ($cont < count($cigar_id)) {


                $order->details()->create([


                    'order_id' => $order->id,
                    'cigar_id' => $cigar_id[$cont],
                    'cigar_barcode' => $cigar_barcode[$cont],
                    'brand_name'=> $brand_name[$cont],
                    'cigar_name' => $cigar_name[$cont],
                    'cigar_size_name' => $cigar_size_name[$cont],
                    'cigar_netWeight' => $cigar_netWeight[$cont],
                    'quantity' => $quantity[$cont],
                    'cigar_unitOfMeasurement_name' => $cigar_unitOfMeasurement_name[$cont],
                    'cigar_unitsInPresentation' => $cigar_unitsInPresentation[$cont],
                    'subTotalCigars' => $subtotalCigars[$cont],
                    'cigar_price' => $cigar_price[$cont],
                    'subAmount' => $subAmount[$cont],

                ]);
                

                $cont = $cont + 1;
            }

            DB::commit();

        }catch (\Exception $e)
        {

            DB::rollback();
        }

        return redirect('customerorders')->with('flash', 'Order created successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }


    public function customershow(Order $order)
    {
        return view('customerorder.show', compact('order'));
    }





    public function download(Order $order)
    {   

        $filename = $order->raw_order_file;

        return response()->download(storage_path("app/public/".$filename));
    }

    public function see(Order $order)
    {   


        $filename = 'Drew Estate October 2016 Order.pdf';

        return response()->file(storage_path("app/public/".$filename));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Order $order)
    {
        // $order = Order::findOrFail($id);

        $company = Company::findOrFail($order->company_id);

        $prices = $company->customertype->PriceRegistrationDetail;

        // dd($prices);

        $cigars = Cigar::where('active', '=', 1)->get();

        // $prices = PriceRegistrationDetail::where('active', '=', 1)->get();

        return view('order.edit', compact('order', 'cigars', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Order $order, Request $request)
    {


        try{

            DB::beginTransaction();

            // $role->update($request->all());

            // $role->permissions()->sync($request->get('permissions'));

            
            $order->update([

                'user_id' => auth()->id(),
                // 'company_id'=> $request->get('company_id'),
                'reference' => $request->get('reference'),
                'company_name'=> $request->get('company_name'),
                'company_shipping_addres'=>$request->get('company_shipping_addres'),
                'company_contact_name'=>$request->get('company_contact_name'),
                'company_contact_email'=>$request->get('company_contact_email'),
                'company_contact_telephone'=>$request->get('company_contact_telephone'),
                'payment_term_name'=>$request->get('payment_term_name'),
                'incoterm_name'=>$request->get('incoterm_name'),
                'customs_agency_name'=>$request->get('customs_agency_name'),
                'customs_agency_shipping_address'=>$request->get('customs_agency_shipping_address'),
                'customs_agency_contact_name'=>$request->get('customs_agency_contact_name'),
                'customs_agency_contact_email'=>$request->get('customs_agency_contact_email'),
                'customs_agency_contact_telephone'=>$request->get('customs_agency_contact_telephone'),
                'total_net_weight_in_grams'=>$request->get('total_net_weight_in_grams'),
                'total_boxes'=>$request->get('total_boxes'),
                'total_packs'=>$request->get('total_packs'),
                'total_cigars'=>$request->get('total_cigars'),
                'amount_order_total'=>$request->get('amount_order_total'),
                'amount_due'=>$request->get('amount_due'),
                // 'raw_order_file'=>$fileName,
                'shipping_quote' =>$request->get('shipping_quote'),
                'final_freight_cost' =>$request->get('final_freight_cost'),
                'grand_total'=>$request->get('grand_total'),



            ]);

            $cigar_id = $request->get('cigar_id');
            $cigar_barcode = $request->get('cigar_barcode');
            $brand_name = $request->get('brand_name');
            $cigar_name = $request->get('cigar_name');
            $cigar_size_name = $request->get('cigar_size_name');
            $cigar_netWeight = $request->get('cigar_netWeight');
            $quantity = $request->get('quantity');
            $cigar_unitOfMeasurement_name = $request->get('cigar_unitOfMeasurement_name');
            $cigar_unitsInPresentation = $request->get('cigar_unitsInPresentation');
            $subtotalCigars = $request->get('subTotalCigars');
            $cigar_price = $request->get('cigar_price');
            $subAmount = $request->get('subAmount');


            $order->details()->delete();

            $cont =0;


            while ($cont < count($cigar_id)) {

                


                $order->details()->create([


                    // 'order_id' => $order->id,
                    'cigar_id' => $cigar_id[$cont],
                    'cigar_barcode' => $cigar_barcode[$cont],
                    'brand_name'=> $brand_name[$cont],
                    'cigar_name' => $cigar_name[$cont],
                    'cigar_size_name' => $cigar_size_name[$cont],
                    'cigar_netWeight' => $cigar_netWeight[$cont],
                    'quantity' => $quantity[$cont],
                    'cigar_unitOfMeasurement_name' => $cigar_unitOfMeasurement_name[$cont],
                    'cigar_unitsInPresentation' => $cigar_unitsInPresentation[$cont],
                    'subTotalCigars' => $subtotalCigars[$cont],
                    'cigar_price' => $cigar_price[$cont],
                    'subAmount' => $subAmount[$cont],

                ]);
                

                $cont = $cont + 1;
            }

            DB::commit();

        }catch (\Exception $e)
        {

            DB::rollback();
        }

        // dd($order);

        
        // $requestData = $request->all();
        
        // $order = Order::findOrFail($id);
        // $order->update($requestData);

 

        return redirect('order')->with('flash', 'Orden actualizada exitosamente!');
    }

    public function orderRevision(Order $order)
    {


        return view('order.revision', compact('order'));


    }


    public function orderShippingQuote(Order $order)
    {


        return view('order.shippingquote', compact('order'));

    }

    public function orderUpdateShippingQuote(Order $order, Request $request)
    {



        $this->validate($request, [


            'shipping_quote' => 'required|numeric',



        ]);


        $shippingquote = $request->get('shipping_quote');

        $amount_order_total = $order->amount_order_total;


        $order->update([


            'shipping_quote' => $shippingquote,

            'grand_total' => $shippingquote + $amount_order_total,

            'amount_due' => $shippingquote + $amount_order_total,


        ]);

        return redirect('order')->with('flash', 'Cotizacion de flete agregada exitosamente!');
    }

    public function orderUpdateRevision(Order $order, Request $request)
    {

        $this->validate($request, [

            'expected_shipping_date' => 'required|date',


        ]);

        // dd($request);

        $expected_shipping_date = $request->get('expected_shipping_date');

        $order->update([

            'expected_shipping_date' => $expected_shipping_date,

        ]);

        $revisedStatus = 2;

        $order->statuses()->attach($revisedStatus);


        return redirect('order')->with('flash', 'Revision agregada exitosamente!');


    }

    public function orderUpdateAprobada(Order $order)
    {

        $approvedStatus =3;

        $order->statuses()->attach($approvedStatus);

        return back();

    }


    public function orderUpdateEmpacada(Order $order)
    {


        $packedStatus = 4;

        $order->statuses()->attach($packedStatus);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Order $order)
    {

        //$order->statuses()->delete();

        $order->details()->delete();

        $order->delete();


        // Order::destroy($id);

        // Session::flash('flash_message', 'Order deleted!');

        return redirect('order')->with('flash', 'Orden eliminada exitosamente!');
    }
}
