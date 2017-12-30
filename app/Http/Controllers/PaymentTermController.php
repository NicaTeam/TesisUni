<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\PaymentTerm;
use Illuminate\Http\Request;
use Session;

class PaymentTermController extends Controller
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
            $paymentterm = PaymentTerm::where('name', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->orWhere('numberDays', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $paymentterm = PaymentTerm::paginate($perPage);
        }

        return view('payment-term.index', compact('paymentterm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('payment-term.create');
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
        
        PaymentTerm::create($requestData);

        Session::flash('flash_message', 'PaymentTerm added!');

        return redirect('payment-term');
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
        $paymentterm = PaymentTerm::findOrFail($id);

        return view('payment-term.show', compact('paymentterm'));
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
        $paymentterm = PaymentTerm::findOrFail($id);

        return view('payment-term.edit', compact('paymentterm'));
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
        
        $paymentterm = PaymentTerm::findOrFail($id);
        $paymentterm->update($requestData);

        Session::flash('flash_message', 'PaymentTerm updated!');

        return redirect('payment-term');
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
        PaymentTerm::destroy($id);

        Session::flash('flash_message', 'PaymentTerm deleted!');

        return redirect('payment-term');
    }
}
