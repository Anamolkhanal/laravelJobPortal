@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class ="card-header">{{$job->title}}</div>
                <div class="card-body">
                    <p>
                        <h3>Description</h3>
                        {{$job->description}}
                    </p>
                    <p>
                        <h3>Duties</h3>
                        {{$job->roles}}
                    </p>
                </div>
                </div>
            <div class="form-group">
                @php
                    $company_id = $job->company->user_id;
                    $seeker_id=Auth::user()->id;
                    $job_id=$job->id;
                @endphp
                <a href="{{route('jobs.apply')."?company=$company_id&seeker=$seeker_id&job=$job_id"}}">
                    <button class ="btn btn-success btn-sm">Apply for Job</button>
                </a>  
            </div>    
            </div>
            <div class="col-md-4">
                <div class="card">
                <div class ="card-header">Short Info</div>
                <div class="card-body">
                    <p>Company:<a href="{{route('company.index',[$job->company->id,$job->company->cname])}}">
                    {{$job->company->cname}}</a></p>
                    <p>Address: {{$job->address}}</p>
                    <p>Job Position:{{$job->position}}</p>
                    <p>Date:{{$job->last_date}}</p>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
