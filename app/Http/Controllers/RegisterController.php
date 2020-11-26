<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    protected function create(array $data){
        $user=User::Create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
        Profile::Create([
            'user_id'=>$user->id,
            'dob'=>$data['dob'],
            'gender'=>$data['gender'],
        ]);
        return $user;
    }
}