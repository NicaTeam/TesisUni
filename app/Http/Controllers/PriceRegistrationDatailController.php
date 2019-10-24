<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\PriceRegistrationDetail;
use Illuminate\Http\Request;
use Session;

class PriceRegistrationDatailController extends Controller
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
            $priceregistrationdatail = PriceRegistrationDetail::where('price_registration_id', 'LIKE', "%$keyword%")
				->orWhere('cigar_id', 'LIKE', "%$keyword%")
				->orWhere('customer_type_id', 'LIKE', "%$keyword%")
				->orWhere('price', 'LIKE', "%$keyword%")
				->orWhere('active', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $priceregistrationdatail = PriceRegistrationDetail::paginate($perPage);
        }

        return view('price-registration-datail.index', compact('priceregistrationdatail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('price-registration-datail.create');
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

        $registerId = $request->get('price_registration_id');
        
        
        
        PriceRegistrationDetail::create([

            'price_registration_id' => $request->get('price_registration_id'),
            'cigar_id' => $request->get('cigar_id'),
            'customer_type_id' => $request->get('customer_type_id'),
            'price' => $request->get('price'),
            'active' => 1,



        ]);

        // Session::flash('flash_message', 'PriceRegistrationDetail added!');

        return back()->with('flash', 'Precio agregado exitosamente!');

        // return redirect('price-registration/'.$registerId)->with('flash', 'Precio agregado exitosamente!');
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
        $priceregistrationdatail = PriceRegistrationDetail::findOrFail($id);

        return view('price-registration-datail.show', compact('priceregistrationdatail'));
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
        $priceregistrationdatail = PriceRegistrationDetail::findOrFail($id);

        return view('price-registration-datail.edit', compact('priceregistrationdatail'));
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
        
        $priceregistrationdatail = PriceRegistrationDetail::findOrFail($id);
        $priceregistrationdatail->update($requestData);

        Session::flash('flash_message', 'PriceRegistrationDetail updated!');

        return redirect('price-registration-datail');
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
        PriceRegistrationDetail::destroy($id);

        Session::flash('flash_message', 'PriceRegistrationDetail deleted!');

        return redirect('price-registration-datail');
    }
}
