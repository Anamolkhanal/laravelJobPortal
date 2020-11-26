<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerProfileController extends Controller
{
    //
    public function show_signup_form()
    {
        return view('emp-register');
    }
    public function process_signup(Request $request)
    {   
        $request->validate([
            'cname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
 
        $employer = \App\Models\Company::create([
            'cname' => trim($request->input('cname')),
            // 'user_type'=>$request['user_type'],
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);
        // \App\Models\Profile::Create([
        //     'user_id'=>$user->id,
        //     'dob'=>$request['dob'],
        //     'gender'=>$request['gender'],
        // ]);

        return redirect()->route('login');
    }
}
