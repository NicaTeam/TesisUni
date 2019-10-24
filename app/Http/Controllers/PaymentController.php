<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;
use SalesProgram\Order;
use SalesProgram\Payment;
use Illuminate\Http\Request;
use Session;
use DB;

class PaymentController extends Controller
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
            $payment = Payment::where('order_id', 'LIKE', "%$keyword%")
				->orWhere('wire_transfer_number', 'LIKE', "%$keyword%")
				->orWhere('bank_name', 'LIKE', "%$keyword%")
				->orWhere('amount_due', 'LIKE', "%$keyword%")
				->orWhere('net_amount_paid', 'LIKE', "%$keyword%")
				->orWhere('external_bank_commission', 'LIKE', "%$keyword%")
				->orWhere('internal_bank_commission', 'LIKE', "%$keyword%")
				->orWhere('new_amount_due', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $payment = Payment::paginate($perPage);
        }

        return view('payment.index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $orders = Order::all();
        return view('payment.create', compact('orders'));
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

                $new_amount_due = $request->get('new_amount_due');


                // dd($new_amount_due * (-1));



                $order = Order::findOrFail($order_id);

                if($new_amount_due < 0){


                    $order->update([

                        'amount_due' =>($new_amount_due * (-1)),

                    ]);

                    $positive_new_amount_due = ($new_amount_due * (-1));


                    Payment::create([

                        'order_id' => $request->get('order_id'),
                        'wire_transfer_number' => $request->get('wire_transfer_number'),
                        'bank_name' => $request->get('bank_name'),
                        'amount_due' => $request->get('amount_due'),
                        'net_amount_paid' => $request->get('net_amount_paid'),
                        'external_bank_commission' => $request->get('external_bank_commission'),
                        'internal_bank_commission' => $request->get('internal_bank_commission'),
                        'new_amount_due' => $positive_new_amount_due,

                    ]);



                }elseif ($new_amount_due >=0) {

                    $order->update([

                        'amount_due' =>($new_amount_due * (-1)),

                    ]);


                    $paidStatus = 5;

                    $order->statuses()->attach($paidStatus);

                    $amount_exceed_paid = ($new_amount_due * (-1));

                    Payment::create([

                        'order_id' => $request->get('order_id'),
                        'wire_transfer_number' => $request->get('wire_transfer_number'),
                        'bank_name' => $request->get('bank_name'),
                        'amount_due' => $request->get('amount_due'),
                        'net_amount_paid' => $request->get('net_amount_paid'),
                        'external_bank_commission' => $request->get('external_bank_commission'),
                        'internal_bank_commission' => $request->get('internal_bank_commission'),
                        'new_amount_due' => $amount_exceed_paid,

                    ]);
                    
                }


                // $requestData = $request->all();

            DB::commit();


        }catch(\Exception $e)
        {

            DB::rollback();


        }

        
        // Session::flash('flash_message', 'Payment added!');

        return redirect('payment')->with('flash', 'Pago agregado exitosamente!');
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
        $payment = Payment::findOrFail($id);

        return view('payment.show', compact('payment'));
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
        $payment = Payment::findOrFail($id);

        $reference = $payment->order->reference;

        return view('payment.edit', compact('payment', 'reference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Payment $payment, Request $request)
    {

         try{

            DB::beginTransaction();

                

                $orderId = $payment->order_id;

                $new_amount_due = $request->get('new_amount_due');


                $order = Order::findOrFail($orderId);

                // $paidStatus = [5];

                $order->statuses()->detach([5]);

                if($new_amount_due < 0){


                    $order->update([

                        'amount_due' =>($new_amount_due * (-1)),

                    ]);

                    $positive_new_amount_due = ($new_amount_due * (-1));


                    $payment->update([

                        // 'order_id' => $request->get('order_id'),
                        'wire_transfer_number' => $request->get('wire_transfer_number'),
                        'bank_name' => $request->get('bank_name'),
                        'amount_due' => $request->get('amount_due'),
                        'net_amount_paid' => $request->get('net_amount_paid'),
                        'external_bank_commission' => $request->get('external_bank_commission'),
                        'internal_bank_commission' => $request->get('internal_bank_commission'),
                        'new_amount_due' => $positive_new_amount_due,

                    ]);



                }elseif ($new_amount_due >=0) {

                    $order->update([

                        'amount_due' =>($new_amount_due * (-1)),

                    ]);


                    // $paidStatus = 5;

                    $order->statuses()->attach([5]);

                    $amount_exceed_paid = ($new_amount_due * (-1));

                    $payment->update([

                        // 'order_id' => $request->get('order_id'),
                        'wire_transfer_number' => $request->get('wire_transfer_number'),
                        'bank_name' => $request->get('bank_name'),
                        'amount_due' => $request->get('amount_due'),
                        'net_amount_paid' => $request->get('net_amount_paid'),
                        'external_bank_commission' => $request->get('external_bank_commission'),
                        'internal_bank_commission' => $request->get('internal_bank_commission'),
                        'new_amount_due' => $amount_exceed_paid,

                    ]);
                    
                }elseif ($new_amount_due == 0) {


                    $order->update([

                        'amount_due' =>$new_amount_due,

                    ]);


                    // $paidStatus = 5;

                    $order->statuses()->attach([5]);

                    $amount_exceed_paid = ($new_amount_due * (-1));

                    $payment->update([

                        // 'order_id' => $request->get('order_id'),
                        'wire_transfer_number' => $request->get('wire_transfer_number'),
                        'bank_name' => $request->get('bank_name'),
                        'amount_due' => $request->get('amount_due'),
                        'net_amount_paid' => $request->get('net_amount_paid'),
                        'external_bank_commission' => $request->get('external_bank_commission'),
                        'internal_bank_commission' => $request->get('internal_bank_commission'),
                        'new_amount_due' => $request->get('new_amount_due'),

                    ]);
                    


                }


                // $requestData = $request->all();

            DB::commit();


        }catch(\Exception $e)
        {

            DB::rollback();


        }

        
        // $requestData = $request->all();
        
        // $payment = Payment::findOrFail($id);
        // $payment->update($requestData);

        // Session::flash('flash_message', 'Payment updated!');

        return redirect('payment')->with('flash', 'Pago actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Payment $payment)
    {

        try{

            DB::beginTransaction();

                $orderId = $payment->order_id;

                $order = Order::findOrFail($orderId);

                if($order->amount_due <=0){

                    $new_order_amount_due = $order->amount_due + $payment->net_amount_paid + $payment->external_bank_commission + $payment->internal_bank_commission;

                    $order->update([

                        'amount_due' => $new_order_amount_due,

                    ]);


                    $order->statuses()->detach([5]);

                }else{

                    $new_order_amount_due = $order->amount_due + $payment->net_amount_paid + $payment->external_bank_commission + $payment->internal_bank_commission;

                    $order->update([

                        'amount_due' => $new_order_amount_due,    

                    ]);
  
                }

                
                $payment->delete();

            DB::commit();


        }catch (\Exception $e)
        {

            DB::rollback();
        }

        // Payment::destroy($id);

        // Session::flash('flash_message', 'Payment deleted!');

        return redirect('payment');
    }
}
