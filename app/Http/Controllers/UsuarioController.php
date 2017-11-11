<?php

namespace SalesProgram\Http\Controllers;

use SalesProgram\Http\Requests;
use SalesProgram\Http\Controllers\Controller;

use SalesProgram\Usuario;
use Illuminate\Http\Request;
use Session;

class UsuarioController extends Controller
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
            $usuario = Usuario::where('Name', 'LIKE', "%$keyword%")
				->orWhere('lastName', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('phone_Number', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $usuario = Usuario::paginate($perPage);
        }

        return view('usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('usuario.create');
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
        
        Usuario::create($requestData);

        Session::flash('flash_message', 'Usuario added!');

        return redirect('usuario');
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
        $usuario = Usuario::findOrFail($id);

        return view('usuario.show', compact('usuario'));
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
        $usuario = Usuario::findOrFail($id);

        return view('usuario.edit', compact('usuario'));
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
        
        $usuario = Usuario::findOrFail($id);
        $usuario->update($requestData);

        Session::flash('flash_message', 'Usuario updated!');

        return redirect('usuario');
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
        Usuario::destroy($id);

        Session::flash('flash_message', 'Usuario deleted!');

        return redirect('usuario');
    }
}
