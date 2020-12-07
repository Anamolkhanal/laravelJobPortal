@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <table class="table">
    <h1>My Application</h1>
        <thead>
        <th>Company Logo</th>
        <th>Position</th>
        <th>Address</th>
        <th>Date</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($user->jobs as $temp)
            @php
            $job=App\Models\Job::find($temp->pivot->job_id);
            @endphp
            <tr>
                <td>
                    @if(empty($job->company->logo))
                        <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
                        width="100" height="100">
                    @else
                        <img style="boarder-radius: 50px" 
                        src="{{asset('uploads/avatar')}}/{{$job->company->logo}}" 
                        width="100" height="100">
                    @endif
                </td>
                <td>
                    {{$job->position}}
                    <br>{{$job->type}}
                </td>
                <td>{{$job->address}}</td>
                <td>{{$job->created_at->diffForHumans()}}</td>
                <td>
                <a href="{{route('jobs.show',[$job->id,$job->roles])}}">
                    <button class ="btn btn-success btn-sm">View More</button>
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
