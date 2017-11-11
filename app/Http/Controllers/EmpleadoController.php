<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Empleado;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Crypt;

class EmpleadoController extends Controller
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
            $empleado = Empleado::where('Nombre', 'LIKE', "%$keyword%")
				->orWhere('Apellido', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('phone_Number', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $empleado = Empleado::paginate($perPage);
        }


        return view('empleado.index', compact('empleado', 'encrypted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('empleado.create');
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
        
        Empleado::create($requestData);

        Session::flash('flash_message', 'Empleado added!');

        return redirect('empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Empleado $empleado)
    {
        //$empleado = Empleado::findOrFail($id);

        echo 'it works!';

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Empleado $empleado)
    {

        //$empleado = Empleado::findOrFail($id);


        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Empleado $empleado, Request $request)
    {
        
        $requestData = $request->all();
        
        //$empleado = Empleado::findOrFail($id);
        $empleado->update($requestData);

        Session::flash('flash_message', 'Empleado updated!');

        return redirect('empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        //Empleado::destroy($empleado);

        Session::flash('flash_message', 'Empleado deleted!');

        return redirect('empleado');
    }
}
