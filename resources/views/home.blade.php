@extends('layouts.app')

@section('content')
<table class="table">
            <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach(Auth::user()->company->jobs as $job)
                <tr>
                    <td>
                    @if(empty(Auth::user()->company->logo))
                        <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
                        width="100" height="100">
                    @else
                        <img style="boarder-radius: 50px" 
                        src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}" 
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
                    <a href="{{route('jobs.edit',[$job->id])}}">
                        <button class ="btn btn-success btn-sm">Edit</button>
                    </a> 
                    <a href="{{route('jobs.delete',[$job->id])}}">
                        <button class ="btn btn-success btn-sm">Delete</button>
                    </a> 
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
