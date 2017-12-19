<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\CompanyType;
use Illuminate\Http\Request;
use Session;

class CompanyTypeController extends Controller
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
            $companytype = CompanyType::where('name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $companytype = CompanyType::paginate($perPage);
        }

        return view('company-type.index', compact('companytype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company-type.create');
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
        
        CompanyType::create($requestData);

        Session::flash('flash_message', 'CompanyType added!');

        return redirect('company-type');
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
        $companytype = CompanyType::findOrFail($id);

        return view('company-type.show', compact('companytype'));
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
        $companytype = CompanyType::findOrFail($id);

        return view('company-type.edit', compact('companytype'));
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
        
        $companytype = CompanyType::findOrFail($id);
        $companytype->update($requestData);

        Session::flash('flash_message', 'CompanyType updated!');

        return redirect('company-type');
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
        CompanyType::destroy($id);

        Session::flash('flash_message', 'CompanyType deleted!');

        return redirect('company-type');
    }
}
