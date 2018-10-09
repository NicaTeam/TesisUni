<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\User;
use SalesProgram\Company;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Crypt;
// use Illuminate\Foundation\Bus\DispatchesJobs;
use Validator;
use Illuminate\Validation\Rule;
use SalesProgram\Filters\UserFilters;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserFilters $filters)
    {

        // dd($users = User::all());

        $users = $this->getUsers($filters);

        // dd($users);

        if (request()->wantsJson()) {
            return $users;
        }


        // $users = User::all();
        
        

        return view('users.index', compact('users'));
    }

    protected function getUsers($filters)
    {

        // dd($filters);

        $users = User::latest()->filter($filters);

        // $users->paginate(3);

        $users = $users->get();



        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $roles = Role::all();

        return view('users.create', compact('companies', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $user->add($request);

        $this->validate($request, [

            'name' => 'required|max:50',
            'email'=>  'required|email|unique:users',
            'password'=>'required|min:6',
            'company_id'=> 'required',

        ]);

        $user = User::create([

            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'password'=> bcrypt($request->get('password')),
            'company_id'=>$request->get('company_id'),


        ]);

        // dd($user->id);

        $roleId = $request->get('role_id');

        $user->roles()->sync($roleId);

        return redirect('users')->with('flash', 'Usuario creado con exito!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        // dd($user);

        // dd($companies = Company::all()->pluck('name', 'id')->toArray());
        $companies = Company::all()->pluck('name', 'id');
        $selectedCompany = $user->company_id;

        // $roles = Role::all();
        $roles= Role::all()->pluck('name', 'id')->toArray();
        
        if($user->roles->count() > 0){

             $selectedRole = $user->roles->first()->id -1;

        }else{

            $selectedRole = null;
        }
       
        // dd($selectedRole);
        return view('users.edit', compact('user', 'companies', 'roles', 'selectedCompany', 'selectedRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        // dd($request->get('role_id')+1);

        // $this->validate($request, [

        //     'name' => 'required|max:50',
        //     'email'=>  'required|email|unique:users|id',
        //     'password'=>'required|min:6',
        //     'company_id'=> 'required',

        // ]);

        $data = $request->toArray();

        Validator::make($data, [


            'name' => 'required|max:50',
            'email' => [
                'required|email',
                Rule::unique('users')->ignore($user->id),
            ],

            'password'=>'required|min:6',
            'company_id'=> 'required',
           
        ]);

        $user->update($request->all());

        $role_id = $request->get('role_id')+1;

        $user->roles()->sync($role_id);

        return redirect('users')->with('flash', 'Usuario actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if($user->active ==1){

            $user->active = 0;

        }else{

            $user->active =1;
        }
        
        $user->update();

        return redirect('users')->with('flash', 'Estado de usuario ha sido actualizado!');
    }
}
