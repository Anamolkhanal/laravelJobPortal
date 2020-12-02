<?php

namespace App\Http\Controllers;
use App\Http\Controllers\notify;
use App\Http\Controllers\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Jobs;

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
            ->with('message','Job Post Successfully');
    }
    public function edit($id){
        $job= Jobs::find($id);
        return view('jobs.edit', compact('job'));
    }
    public function delete($id){
        $job= Jobs::find($id)->delete();
        return redirect()->back()
            ->with('message','Job Post Delete Successfully');
    }
    public function apply(Request $req ){
        $company_id=$req->company;
        $seeker_name=$req->seeker;
        $job_title=$req->job;
    
        User::find($company_id)->notify(new notify);
         

    }

}

