@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <table class="table">
            <form action="#" method="GET" style="margin-top: 20px;">
                <select name="job_id" id="input_title">
                    <option value="0">Select Job Title</option>
                </select>
                <select name="job_address" id="input_address">
                    <option value="0">Select Address</option>
                </select>
                <select name="job_category" id="input_category">      
                    <option value="0">Select Category</option>
                </select>
                <select name="job_type" id="input_type">
                    <option value="0">Select Category</option>
                </select>
            
                <input type="submit" class="btn btn-danger btn-sm" value="Search">
            </form>
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