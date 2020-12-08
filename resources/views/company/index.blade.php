@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="company-profile">
            @if(empty($company->cover_photo))
                <img src="{{asset('avatar/banner.png')}}" 
                width="100%" >
            @else
                <img src="{{asset('uploads/avatar')}}/{{$company->cover_photo}}" 
                width="100%">
              
            @endif
            </div>
            <div class="company-desc"><br>
            @if(empty($company->logo))
                <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
                width="100" height="100">
            @else
                <img style="boarder-radius: 50px" 
                src="{{asset('uploads/avatar')}}/{{$company->logo}}" 
                width="100" height="100">
               
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
                    @if(Auth::user()->user_type=="seeker")
                    <a href="{{route('jobs.show',[$job->id,$job->roles])}}">
                        <button class ="btn btn-success btn-sm">View More</button>
                    </a>
                    @endif 
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection

