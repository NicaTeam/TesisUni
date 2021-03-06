<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;

use SalesProgram\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use SalesProgram\Mail\Welcome;


class RegistrationController extends Controller
{





    public function create(){

        return view('registration.create');

    }





    public function store(Request $request){

        //validate the form

        $this->validate(request(), [

            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);




        //create and save the user
//        $pass = encrypt($request->input('password'));

//       $user = User::create(request(['name', 'email', $pass]));
       $user = User::create([
           'name'       => $request->input('name'),
           'email'      => $request->input('email'),
           'password'   => bcrypt($request->input('password'))
       ]);




        //Once created the user sign it in.

        auth()->login($user);

        \Mail::to($user)->send(new Welcome);


        // redirect to the home page

        return redirect()->home();





    }
}
