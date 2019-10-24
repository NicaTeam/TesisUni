<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;
use SalesProgram\Order;
use SalesProgram\Shipping;
use SalesProgram\FreightType;
use SalesProgram\FreightProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class ShippingController extends Controller
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
            $shipping = Shipping::where('order_id', 'LIKE', "%$keyword%")
				->orWhere('invoiceNumbers', 'LIKE', "%$keyword%")
				->orWhere('invoicesFiles', 'LIKE', "%$keyword%")
				->orWhere('packingListFiles', 'LIKE', "%$keyword%")
				->orWhere('awbFiles', 'LIKE', "%$keyword%")
				->orWhere('sanitaryCertificateFiles', 'LIKE', "%$keyword%")
				->orWhere('freight_type_name', 'LIKE', "%$keyword%")
				->orWhere('freight_provider_id', 'LIKE', "%$keyword%")
				->orWhere('freight_provider_name', 'LIKE', "%$keyword%")
				->orWhere('freight_cost', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $shipping = Shipping::paginate($perPage);
        }

        return view('shipping.index', compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $orders = Order::all();
        $freightTypes = FreightType::all();
        $freightProviders = FreightProvider::all();
        return view('shipping.create', compact('orders', 'freightTypes', 'freightProviders'));
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



         try{

            DB::beginTransaction();

                $order_id = $request->get('order_id');

                $order = Order::findOrFail($order_id);

                $order_amount_order_total = $order->amount_order_total;

                $order_final_freight_cost = $request->get('freight_cost');

                $freightTypeId = $request->get('freight_type_name');

                $freightType = FreightType::findOrFail($freightTypeId);

                $freightTypeName = $freightType->name;

                $freightProviderId= $request->get('freight_provider_id');

                $freightProvider = FreightProvider::findOrFail($freightProviderId);

                $freightProviderName = $freightProvider->name;


                if($order->payment_term_name != 'Antes de envio'){

                    $order->update([

                        'final_freight_cost' => $order_final_freight_cost,
                        'grand_total' => $order_amount_order_total + $order_final_freight_cost,
                        'amount_due' => $order_amount_order_total + $order_final_freight_cost,

                    ]);

                }else{

                    $order->update([

                        'final_freight_cost' => $order_final_freight_cost,

                    ]);

                }

                $sentStatus = 6;

                $order->statuses()->attach($sentStatus);

                if (Input::hasFile('invoicesFiles')){

                    $invoicefile = uniqid().'_'.Input::file('invoicesFiles')->getClientOriginalName();

                    $path = $request->file('invoicesFiles')->storeAs('public', $invoicefile);

                    // $file =Input::file('raw_order_file');
                    // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                    // $file->getClientOriginalName();

                }else{

                    $invoicefile = null;
                }

                if (Input::hasFile('packingListFiles')){

                    $packinglistfile = uniqid().'_'.Input::file('packingListFiles')->getClientOriginalName();

                    $path = $request->file('packingListFiles')->storeAs('public', $packinglistfile);

                    // $file =Input::file('raw_order_file');
                    // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                    // $file->getClientOriginalName();

                }else{

                    $packinglistfile = null;
                }


                if (Input::hasFile('awbFiles')){

                    $awbfile = uniqid().'_'.Input::file('awbFiles')->getClientOriginalName();

                    $path = $request->file('awbFiles')->storeAs('public', $awbfile);

                    // $file =Input::file('raw_order_file');
                    // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                    // $file->getClientOriginalName();

                }else{

                    $awbfile = null;
                }


                if (Input::hasFile('sanitaryCertificateFiles')){

                    $sanitaryfile = uniqid().'_'.Input::file('sanitaryCertificateFiles')->getClientOriginalName();

                    $path = $request->file('sanitaryCertificateFiles')->storeAs('public', $sanitaryfile);

                    // $file =Input::file('raw_order_file');
                    // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                    // $file->getClientOriginalName();

                }else{

                    $sanitaryfile = null;
                }

                Shipping::create([


                    'order_id' => $order->id,
                    'invoiceNumbers' => $request->get('invoiceNumbers'),
                    'invoicesFiles' =>  $invoicefile,
                    'packingListFiles' => $packinglistfile,
                    'awbFiles' => $awbfile,
                    'sanitaryCertificateFiles' => $sanitaryfile,
                    'freight_type_name' => $freightTypeName,
                    'freight_provider_id' => $request->get('freight_provider_id'),
                    'freight_provider_name' => $freightProviderName,
                    'freight_cost' => $request->get('freight_cost'),

                ]);


            DB::commit();


        }catch (\Exception $e)
        {

            DB::rollback();
        }
        
        // $requestData = $request->all();
        
        // Shipping::create($requestData);

        // Session::flash('flash_message', 'Shipping added!');

        return redirect('shipping')->with('flash', 'Envio creado exitosamente!');
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
        $shipping = Shipping::findOrFail($id);

        return view('shipping.show', compact('shipping'));
    }

    public function invoicedownload(Shipping $shipping)
    {

        $invoicesFiles = $shipping->invoicesFiles;

        return response()->download(storage_path("app/public/".$invoicesFiles));
    }

    public function packinglistdownload(Shipping $shipping)
    {

        $packingListFiles = $shipping->packingListFiles;

        return response()->download(storage_path("app/public/".$packingListFiles));
    }


    public function awbdownload(Shipping $shipping)
    {

        $awbFiles = $shipping->awbFiles;

        return response()->download(storage_path("app/public/".$awbFiles));
    }

    public function certificatedownload(Shipping $shipping)
    {

        $certificates = $shipping->sanitaryCertificateFiles;

        return response()->download(storage_path("app/public/".$certificates));
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
        $shipping = Shipping::findOrFail($id);
        $freightTypes = FreightType::pluck('name', 'id');
        $freightTypeName = $shipping->freight_type_name;

        $selectedFreightType = FreightType::where('name','=', $freightTypeName)->pluck('id');
        $freightProviders = FreightProvider::pluck('name', 'id');

        return view('shipping.edit', compact('shipping', 'freightTypes', 'freightProviders', 'selectedFreightType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Shipping $shipping, Request $request)
    {

        try{

            DB::beginTransaction();

                $order_id = $shipping->order_id;

                $order = Order::findOrFail($order_id);

                $order_amount_order_total = $order->amount_order_total;

                $order_final_freight_cost = $request->get('freight_cost');


                $freightTypeId = $request->get('freight_type_name');

                $freightType = FreightType::findOrFail($freightTypeId);

                $freightTypeName = $freightType->name;

                $freightProviderId= $request->get('freight_provider_id');

                $freightProvider = FreightProvider::findOrFail($freightProviderId);

                $freightProviderName = $freightProvider->name;


                if($order->payment_term_name != 'Antes de envio'){

                    $order->update([

                        'final_freight_cost' => $order_final_freight_cost,
                        'grand_total' => $order_amount_order_total + $order_final_freight_cost,
                        'amount_due' => $order_amount_order_total + $order_final_freight_cost,

                    ]);

                }else{

                    $order->update([

                        'final_freight_cost' => $order_final_freight_cost,

                    ]);

                }


                if (Input::hasFile('invoicesFiles')){

                    $invoicefile = uniqid().'_'.Input::file('invoicesFiles')->getClientOriginalName();

                    $path = $request->file('invoicesFiles')->storeAs('public', $invoicefile);

                    // $file =Input::file('raw_order_file');
                    // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                    // $file->getClientOriginalName();

                }else{

                    $invoicefile = $shipping->invoicesFiles;
                }

                if (Input::hasFile('packingListFiles')){

                    $packinglistfile = uniqid().'_'.Input::file('packingListFiles')->getClientOriginalName();

                    $path = $request->file('packingListFiles')->storeAs('public', $packinglistfile);

                    // $file =Input::file('raw_order_file');
                    // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                    // $file->getClientOriginalName();

                }else{

                    $packinglistfile = $shipping->packingListFiles;
                }


                if (Input::hasFile('awbFiles')){

                    $awbfile = uniqid().'_'.Input::file('awbFiles')->getClientOriginalName();

                    $path = $request->file('awbFiles')->storeAs('public', $awbfile);

                    // $file =Input::file('raw_order_file');
                    // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                    // $file->getClientOriginalName();

                }else{

                    $awbfile = $shipping->awbFiles;
                }


                if (Input::hasFile('sanitaryCertificateFiles')){

                    $sanitaryfile = uniqid().'_'.Input::file('sanitaryCertificateFiles')->getClientOriginalName();

                    $path = $request->file('sanitaryCertificateFiles')->storeAs('public', $sanitaryfile);

                    // $file =Input::file('raw_order_file');
                    // $file->move(public_path().'/orderFiles/', $file->getClientOriginalName());
                    // $file->getClientOriginalName();

                }else{

                    $sanitaryfile = $shipping->sanitaryCertificateFiles;
                }

                $shipping->update([


                    'invoiceNumbers' => $request->get('invoiceNumbers'),
                    'invoicesFiles' =>  $invoicefile,
                    'packingListFiles' => $packinglistfile,
                    'awbFiles' => $awbfile,
                    'sanitaryCertificateFiles' => $sanitaryfile,
                    'freight_type_name' => $freightTypeName,
                    'freight_provider_id' => $request->get('freight_provider_id'),
                    'freight_provider_name' => $freightProviderName,
                    'freight_cost' => $request->get('freight_cost'),


                ]);

            DB::commit();


        }catch (\Exception $e)
        {

            DB::rollback();
        }



        // $requestData = $request->all();
        
        // $shipping = Shipping::findOrFail($id);
        // $shipping->update($requestData);

        // Session::flash('flash_message', 'Shipping updated!');

        return redirect('shipping')->with('flash', 'Envio actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Shipping $shipping)
    {

         try{

            DB::beginTransaction();

                $order_id = $shipping->order_id;

                $order = Order::findOrFail($order_id);


                $order_amount_order_total = $order->amount_order_total;



                $order_final_freight_cost = 0.00;

                // dd($order->payment_term_name);

                

                $order->statuses()->detach([6]);

                if($order->payment_term_name != 'Antes de envio'){

                    $order->update([

                        'final_freight_cost' => $order_final_freight_cost,
                        'grand_total' => $order_amount_order_total + $order_final_freight_cost,
                        'amount_due' => $order_amount_order_total + $order_final_freight_cost,

                    ]);

                }else{

                    $order->update([

                        'final_freight_cost' => $order_final_freight_cost,

                    ]);

                }

                // dd($order);

                

                $shipping->delete();

            DB::commit();


        }catch (\Exception $e)
        {

            DB::rollback();
        }


        // Shipping::destroy($id);

        //Session::flash('flash_message', 'Shipping deleted!');

        return redirect('shipping')->with('flash', 'Envio eliminado con exito!');
    }
}
