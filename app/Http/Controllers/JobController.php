<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Notifications\notify;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Profile;


class JobController extends Controller
{
    public function index(){
        $jobs =Job::latest('created_at')->paginate(7);
        return view('welcome',compact('jobs'));
    }

    public function show($id,Job $job){
        $applied = false;
        if (Auth::check()) {
            
        $user_id=Auth::user()->id;
        $job_id=$id;
            
        $user = User::find($user_id);
        $hasTask = $user->jobs()->where('jobs.id', $job_id)->exists();
        if($hasTask){
            $applied = true;
        }
        }
        return view('jobs.show',compact('job','applied'));
    }

    public function create(){

        return view('jobs.create');
    }
    public function store(){
 
        $user_id=Auth::user()->id;
        $company=Company::Where('user_id',$user_id)->first();
        $company_id=$company->id;
        Job::create([
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
        $job= Job::find($id);
        return view('jobs.edit', compact('job'));
    }
    public function delete($id){
        $job= Job::find($id)->delete();
        return redirect()->back()
            ->with('message','Job Post Delete Successfully');
    }
    public function apply(Request $req ){
        $company_id=$req->company;
        $seeker=User::find($req->seeker);
        $seeker_name=$seeker['name'];
        $job=Job::find($req->job);
        $job_title=$job['title'];
    
        User::find($company_id)->notify(new notify($job_title,$seeker_name));
        Auth::user()->jobs()->attach($req->job);

           return redirect()->back()
            ->with('message','You have Successfully Applied for this Job.');

    }
    public function cancel(Request $req ){
        $company_id=$req->company;
        $seeker=User::find($req->seeker);
        $seeker_name=$seeker['name'];
        $job=Job::find($req->job);
        $job_title=$job['title'];
    
        User::find($company_id)->notify(new notify($job_title,$seeker_name));
        Auth::user()->jobs()->detach($req->job);

           return redirect()->back()
            ->with('message','You have Successfully Cancel Your Application.');

    }

}

