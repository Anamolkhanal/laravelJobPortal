@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class ="card-header">
                    {{$job->title}}
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
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class ="card-header">Seeker Information
                </div>
                <div class="card-body">
                    <p><b>Name:</b>{{$user->name}}</p>
                    <p><b>Email:</b>{{$user->email}}</p>
                    <p><b>Gender:</b>{{$user->profile->name}}</p>
                    <p><b>Date of birth:</b>{{$user->profile->gender}}</p>
                    <p><b>Address:</b>{{$user->profile->address}}</p>
                    <p><b>Phone Number:</b>{{$user->profile->phone_number}}</p>
                    <p><b>Experience:</b>{{$user->profile->experience}}</p>
                    <p><b>Biodata:</b>{{$user->profile->bio}}</p>
                    <p><b>Memeber Since:{{date('F d Y',strtotime($user->profile->created_at))}}</b></p>
                    @if(!empty($user->profile->cover_letter))
                        <p>
                            <a href="{{Storage::url($user->profile->cover_letter)}}">Cover Letter</a>
                        </p>
                    @else
                        <p>Cover Letter is not available</p>
                    @endif

                    @if(!empty(Auth::user()->profile->resume))
                        <p>
                            <a href="{{Storage::url($user->profile->Resume)}}">Resume</a>
                        </p>
                    @else
                        <p>Resume is not available</p>
                    @endif
                </div>

            <a href="{{route('sendemail',[$user->id])}}" class="btn btn-success">Accept </a>
                <a href="#" class="btn btn-danger">Decline</a>
            </div>
        </div>
    </div>
</div>

@endsection