@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
            <div class ="card-header">{{$job->title}}
            </div>
            <div class="card-body">
                <p>
                    <h3>Description</h3>
                    {{$job->description}}
                </p>
                <p>
                    <h3>Duties</h3>
                    {{$job->roles}}
                </p>
                
                <div class="card-body">
                    <p><b>Name:</b></p>
                    <p><b>Email:</b></p>
                    <p><b>Gender:</b></p>
                    <p><b>Date of birth:</b></p>
                    <p><b>Address:</b></p>
                    <p><b>Phone Number:</b></p>
                    <p><b>Experience:</b></p>
                    <p><b>Biodata:</b></p>
                    <p><b>Memeber Since:{{date('F d Y',strtotime())}}</b></p>
                    @if(!empty(Auth::user()->profile->cover_letter))
                        <p>
                            <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover Letter</a>
                        </p>
                    @else
                        <p>Cover Letter not avaliable</p>
                    @endif

                    @if(!empty(Auth::user()->profile->resume))
                        <p>
                            <a href="{{Storage::url(Auth::user()->profile->Resume)}}">Resume</a>
                        </p>
                    @else
                        <p>Resume not avaliable</p>
                    @endif

                </div>

                <a href="#" class="btn btn-success">Accept </a>
                <a href="#" class="btn btn-danger">Decline</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection