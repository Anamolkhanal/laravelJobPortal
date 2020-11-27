@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="company-profile">
                <img src="{{asset('cover/banner.png')}}" width="100%">
            </div>
            <div class="company-desc"><br>
            <img src="{{asset('avatar/apple.png')}}" width="100">
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
@endsection

