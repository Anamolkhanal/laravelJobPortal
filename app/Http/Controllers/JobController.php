<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Jobs;;
use Auth;

class JobController extends Controller
{
    public function index(){
        $jobs =Jobs::latest('created_at')->paginate(7);
        return view('welcome',compact('jobs'));
    }

    public function show($id,Jobs $job){
        return view('jobs.show',compact('job'));
    }

    public function create(){

        return view('jobs.create');
    }
    public function store(){
 
        $user_id=Auth::user()->id;
        $company=Company::Where('user_id',$user_id)->first();
        $company_id=$company->id;
        Jobs::create([
            'user_id'=> $user_id,
            'company_id'=>$company_id,
            'title'=>request('title'),
            'roles'=>request('roles'),
            'description'=>request('description'),
            'category_id'=>request('category_id'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date'),

        ]);
        return redirect()->back()
            ->with('message','Job Pted Successfully');
    }
    public function edit(){

        return view('jobs.edit');
    }

}

