@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <table class="table">
        <h1>Recents Jobs</h1>
            <thead>
            <th>Company Logo</th>
            <th>Position</th>
            <th>Address</th>
            <th>Date</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td><img src ="{{asset('avatar/apple.png')}}" width="80"></td>
                    <td>
                        {{$job->position}}
                        <br>{{$job->type}}
                    </td>
                    <td>{{$job->address}}</td>
                    <td>{{$job->created_at->diffForHumans()}}</td>
                    <td>
                    <a href="{{route('jobs.show',[$job->id,$job->roles])}}">
                        <button class ="btn btn-success btn-sm">Apply</button>
                    </a>  
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <span>
        {{$jobs->links()}}
    </span>
    @endsection