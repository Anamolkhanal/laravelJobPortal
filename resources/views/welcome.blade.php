@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <table class="table">
        <!-- The form -->
        <form class="container" action="#">
        <input  style="padding: 10px;
        font-size: 13px;
        border: 1px solid grey;
        float: left;
        width: 25%;
        background: #f1f1f1;
        margin:20px;" type="text" placeholder="Search Job by Title, Category, Type.." name="search">
        
        <input  style="padding: 10px;
         font-size: 13px;
         border: 1px solid grey;
         float: left;
         width: 25%;
         background: #f1f1f1;
         margin:20px;" type="text" placeholder="Location.." name="search_location">
        
        <button style=" float: left;
        width: 20%;
        padding: 10px;
        margin:20px;"
        class ="btn btn-success btn-sm" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <br><br><br><br>
        <h1>Recents Job</h1>
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
                    <td>
                        @if(empty(Auth::user()->profile->avatar))
                            <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
                            width="100" height="200">
                        @else
                            <img style="boarder-radius: 50px" 
                            src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" 
                            width="100" height="200">
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
    <span>
        {{$jobs->links()}}
    </span>
    @endsection