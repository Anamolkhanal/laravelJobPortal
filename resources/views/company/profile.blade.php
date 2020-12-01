@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        @if(empty(Auth::user()->company->logo))
            <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
            width="100" height="200">
        @else
            <img style="boarder-radius: 50px" 
            src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}" 
            width="100" height="200">
        @endif
            <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Update Your Company logo</div>
                <div class="card-body">
                    <input type="file" name="logo" class="form-control">
                    <br>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
            </form>
            @if($errors->has('logo'))
                <div class="error" style="color:red">
                    {{$errors->first('logo')}}
                </div>     
            @endif
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Update Company Information</div>
                <div class="card-body">
                <form action="{{route('company.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Address       : </label>
                        <textarea class="from-control" rows="3" name="address">{{Auth::user()->company->address}}</textarea>    
                    </div>
                        @if($errors->has('address'))
                            <div class="error" style="color:red">
                            {{$errors->first('address')}}
                            </div>     
                        @endif
                    <div class="form-group">
                        <label>Phone Number  : </label>
                        <input value="{{Auth::user()->company->phone}}" type="number" class="from-control" name="phonenumber">    
                    </div>
                    @if($errors->has('phone_number'))
                            <div class="error" style="color:red">
                            {{$errors->first('phonenumber')}}
                            </div>     
                        @endif
                    <div class="form-group">
                        <label>Website    : </label>
                        <textarea class="from-control" rows="3" name="website">{{Auth::user()->company->website}}</textarea>    
                    </div>
                    @if($errors->has('website'))
                            <div class="error" style="color:red">
                            {{$errors->first('website')}}
                            </div>     
                        @endif
                    <div class="form-group">
                        <label>Slogan       : </label>
                        <textarea class="from-control" rows="3" name="bio">{{Auth::user()->company->slogan}}</textarea>    
                    </div>
                    @if($errors->has('slogan'))
                            <div class="error" style="color:red">
                            {{$errors->first('slogan')}}
                            </div>     
                    @endif
                    <div class="form-group">
                        <label>Description       : </label>
                        <textarea class="from-control" rows="3" name="bio">{{Auth::user()->company->description}}</textarea>    
                    </div>
                    @if($errors->has('description'))
                            <div class="error" style="color:red">
                            {{$errors->first('description')}}
                            </div>     
                    @endif
                   <div class="form-group">
                        <button class="btn btn-success">Submit</button>
                    </div>
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                </form>
                </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">Company Details 
                </div> 
                <div class="card-body">
                    <p><b>Name: {{Auth::user()->name}}</b></p>
                    <p><b>Email: {{Auth::user()->email}}</b></p>
                    <p><b>Address: {{Auth::user()->company->address}}</b></p>
                    <p><b>Phone Number: {{Auth::user()->company->phone}}</b></p>
                    <p><b>Website: {{Auth::user()->company->website}}</b></p>
                    <p><b>Slogan: {{Auth::user()->company->slogan}}</b></p>
                    <p><b>Description: {{Auth::user()->company->description}}</b></p>
                    <p><b>Memeber Since:{{date('F d Y',strtotime(Auth::user()->company->created_at))}}</b></p>
                    @if(!empty(Auth::user()->company->cover_photo))
                        <p>
                            <a href="{{Storage::url(Auth::user()->company->cover_photo)}}">Cover Photo</a>
                        </p>
                    @else
                        <p>Please Upload Company Cover Photo</p>
                    @endif
                </div>
            </div>
            <form action="{{route('company.coverphoto')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Update Cover Photo</div>
                <div class="card-body">
                    <input type="file" name="cover_photo" class="form-control">
                    <br>
                    <button class="btn btn-primary">Update</button>

                </div>
            </div>
            </form>
            @if($errors->has('cover_photo'))
                            <div class="error" style="color:red">
                            {{$errors->first('cover_photo')}}
                            </div>     
                        @endif
        </div>
    </div>
</div>
@endsection