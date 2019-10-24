<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\OrderStatus;
use Illuminate\Http\Request;
use Session;

class OrderStatusController extends Controller
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
            $orderstatus = OrderStatus::where('order_id', 'LIKE', "%$keyword%")
				->orWhere('status_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $orderstatus = OrderStatus::paginate($perPage);
        }

        return view('order-status.index', compact('orderstatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('order-status.create');
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
        
        OrderStatus::create($requestData);

        Session::flash('flash_message', 'OrderStatus added!');

        return redirect('order-status');
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
        $orderstatus = OrderStatus::findOrFail($id);

        return view('order-status.show', compact('orderstatus'));
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
        $orderstatus = OrderStatus::findOrFail($id);

        return view('order-status.edit', compact('orderstatus'));
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
        
        $orderstatus = OrderStatus::findOrFail($id);
        $orderstatus->update($requestData);

        Session::flash('flash_message', 'OrderStatus updated!');

        return redirect('order-status');
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
        OrderStatus::destroy($id);

        Session::flash('flash_message', 'OrderStatus deleted!');

        return redirect('order-status');
    }
}
