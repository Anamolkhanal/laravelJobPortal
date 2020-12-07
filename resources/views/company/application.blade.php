@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <table class="table">
    <h1>Total Application</h1>
        <thead>
        <th>Seeker Profile</th>
        <th>Name</th>
        <th>Job Title</th>
        <th>Date</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($jobs->id as $temp)
            @php
                $profile=App\Models\Profile::find($temp->pivot->user_id);
                $job=App\Models\Job::find($temp->pivot->job_id);
            @endphp
            <tr>
                <td>
                    @if(empty($profile->avatar))
                        <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
                        width="100" height="100">
                    @else
                        <img style="boarder-radius: 50px" 
                        src="{{asset('uploads/avatar')}}/{{$profile->avatar}}" 
                        width="100" height="100">
                    @endif
                </td>
                <td>
                    {{$profile->name}}
                </td>
                <td>
                    {{$job->title}}
                    <br>{{$job->type}}
                </td>
                <td>{{$job->created_at->diffForHumans()}}</td>
                <td>
                <a href="{{route('jobs.show',[$job->id,$job->roles])}}">
                    <button class ="btn btn-success btn-sm">View Profile</button>
                </a>  
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
{{-- <span>
    {{$job->links()}}
</span> --}}
@endsection

