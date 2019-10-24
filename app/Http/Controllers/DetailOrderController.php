<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\DetailOrder;
use Illuminate\Http\Request;
use Session;

class DetailOrderController extends Controller
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
            $detailorder = DetailOrder::where('order_id', 'LIKE', "%$keyword%")
				->orWhere('cigar_id', 'LIKE', "%$keyword%")
				->orWhere('cigar_barcode', 'LIKE', "%$keyword%")
				->orWhere('brand_name', 'LIKE', "%$keyword%")
				->orWhere('cigar_name', 'LIKE', "%$keyword%")
				->orWhere('cigar_size_name', 'LIKE', "%$keyword%")
				->orWhere('cigar_netWeight', 'LIKE', "%$keyword%")
				->orWhere('quantity', 'LIKE', "%$keyword%")
				->orWhere('cigar_unitOfMeasurement_name', 'LIKE', "%$keyword%")
				->orWhere('subTotalCigars', 'LIKE', "%$keyword%")
				->orWhere('cigar_price', 'LIKE', "%$keyword%")
				->orWhere('subAmount', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $detailorder = DetailOrder::paginate($perPage);
        }

        return view('detail-order.index', compact('detailorder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('detail-order.create');
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
        
        DetailOrder::create($requestData);

        Session::flash('flash_message', 'DetailOrder added!');

        return redirect('detail-order');
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
        $detailorder = DetailOrder::findOrFail($id);

        return view('detail-order.show', compact('detailorder'));
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
        $detailorder = DetailOrder::findOrFail($id);

        return view('detail-order.edit', compact('detailorder'));
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
        
        $detailorder = DetailOrder::findOrFail($id);
        $detailorder->update($requestData);

        Session::flash('flash_message', 'DetailOrder updated!');

        return redirect('detail-order');
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
        DetailOrder::destroy($id);

        Session::flash('flash_message', 'DetailOrder deleted!');

        return redirect('detail-order');
    }
}
