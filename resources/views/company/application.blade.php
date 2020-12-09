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
        @foreach($appliedJobs as $item)
            @php 
                $user=App\Models\User::find($item->user_id);
                $job=App\Models\Job::find($item->job_id);
            @endphp
            <tr>
                <td>
                    @if(empty($user->profile->avatar))
                        <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
                        width="100" height="100">
                    @else
                        <img style="boarder-radius: 50px" 
                        src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}" 
                        width="100" height="100">
                    @endif
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$job->title}}
                    <br>{{$job->type}}
                </td>
                <td>{{$job->created_at->diffForHumans()}}</td>
                <td>
                <a href="{{route('company.seeker',[$job->id,$user->id])}}">
                    <button class ="btn btn-success btn-sm">View Profile</button>
                </a>  
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection

