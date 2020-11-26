<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class JobController extends Controller
{
    public function index(){
        $jobs =Jobs::all()->take(10);
        return view('welcome',compact('jobs'));
    }

    public function show($id,Jobs $job){
        return view('jobs.show',compact('job'));
    }
}
