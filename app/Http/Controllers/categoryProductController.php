<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\categoryProduct;
use Illuminate\Http\Request;
use Session;

class categoryProductController extends Controller
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
            $categoryproduct = categoryProduct::where('categoria', 'LIKE', "%$keyword%")
				->orWhere('descripcion', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $categoryproduct = categoryProduct::paginate($perPage);
        }

        return view('category-product.index', compact('categoryproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('category-product.create');
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
        
        categoryProduct::create($requestData);

        Session::flash('flash_message', 'categoryProduct added!');

        return redirect('category-product');
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
        $categoryproduct = categoryProduct::findOrFail($id);

        return view('category-product.show', compact('categoryproduct'));
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
        $categoryproduct = categoryProduct::findOrFail($id);

        return view('category-product.edit', compact('categoryproduct'));
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
        
        $categoryproduct = categoryProduct::findOrFail($id);
        $categoryproduct->update($requestData);

        Session::flash('flash_message', 'categoryProduct updated!');

        return redirect('category-product');
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
        categoryProduct::destroy($id);

        Session::flash('flash_message', 'categoryProduct deleted!');

        return redirect('category-product');
    }
}
