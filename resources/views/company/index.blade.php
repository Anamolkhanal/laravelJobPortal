@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="company-profile">
                <img src="{{asset('cover/banner.png')}}" width="100%">
            </div>
            <div class="company-desc"><br>
            @if(empty(Auth::user()->profile->avatar))
                <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
                width="100" height="200">
            @else
                <img style="boarder-radius: 50px" 
                src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" 
                width="100" height="200">
            @endif
            <h1>{{$company->cname}}</h1>
            <p>{{$company->description}}</p>
            <p><b>Slogan: </b>&nbsp;{{$company->slogan}}</p>
            <p><b>Address:</b>&nbsp;{{$company->address}}</p>
            <p><b>Phone:</b>&nbsp;{{$company->phone}}</p>
            <p><b>Websites:</b>&nbsp;{{$company->website}}</p>
            </div>
            <table class="table">
            <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($company->jobs as $job)
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
                        <button class ="btn btn-success btn-sm">Apply</button>
                    </a>  
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection

