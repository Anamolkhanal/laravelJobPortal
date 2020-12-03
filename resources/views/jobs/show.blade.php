@extends('layouts.app')

@section('content')
<style>
    .temp{
        background: red;
        pointer-events: none;
    }
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
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
                @auth
                <div class="form-group">
                    @php
                        $company_id = $job->company->user_id;
                        $job_id=$job->id;
                        $seeker_id=Auth::user()->id;
                    @endphp
                    @if ($applied == true)
                    <a href="" class ="btn btn-success">
                        Already Applied
                     </a>
                    <a href="{{route('jobs.cancel')."?company=$company_id&seeker=$seeker_id&job=$job_id"}}" class="btn btn-danger">Cancel</a>
                    @else
                    <a href="{{route('jobs.apply')."?company=$company_id&seeker=$seeker_id&job=$job_id"}}" class ="btn btn-success btn-sm" >
                        Apply for Job
                    </a>
                    @endif  
                </div>
                @else
                <div class="form-group">
                <a href="{{route('login')}}" class ="btn btn-success" >
                        Login To Apply
                    </a>
                </div>
                @endauth
            
            <div class="col-md-8">
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
