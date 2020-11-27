@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        @if(empty(Auth::user()->profile->avatar))
            <img style="boarder-radius: 50px" src="{{asset('avatar/apple.png')}}" 
            width="100" height="200">
        @else
        <img style="boarder-radius: 50px" 
        src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" 
            width="100" height="200">
        @endif
            
            <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Update Your Profile Picture</div>
                <div class="card-body">
                    <input type="file" name="avatar" class="form-control">
                    <br>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
            </form>
            @if($errors->has('avatar'))
                            <div class="error" style="color:red">
                            {{$errors->first('avatar')}}
                            </div>     
                        @endif
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Your Information</div>
                <div class="card-body">
                <form action="{{route('profile.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="from-control" rows="3" name="address">{{Auth::user()->profile->address}}</textarea>    
                    </div>
                        @if($errors->has('address'))
                            <div class="error" style="color:red">
                            {{$errors->first('address')}}
                            </div>     
                        @endif
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input value="{{Auth::user()->profile->phone_number}}" type="number" class="from-control" name="phonenumber">    
                    </div>
                    @if($errors->has('phone_number'))
                            <div class="error" style="color:red">
                            {{$errors->first('phonenumber')}}
                            </div>     
                        @endif
                    <div class="form-group">
                        <label>Experience</label>
                        <textarea class="from-control" rows="3" name="experience">{{Auth::user()->profile->experience}}</textarea>    
                    </div>
                    @if($errors->has('experience'))
                            <div class="error" style="color:red">
                            {{$errors->first('experience')}}
                            </div>     
                        @endif
                    <div class="form-group">
                        <label>Biodata</label>
                        <textarea class="from-control" rows="3" name="bio">{{Auth::user()->profile->bio}}</textarea>    
                    </div>
                    @if($errors->has('bio'))
                            <div class="error" style="color:red">
                            {{$errors->first('bio')}}
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
                <div class="card-header">User Details </div> 
                <div class="card-body">
                    <p><b>Name: {{Auth::user()->name}}</b></p>
                    <p><b>Email: {{Auth::user()->email}}</b></p>
                    <p><b>Address: {{Auth::user()->profile->address}}</b></p>
                    <p><b>Phone Number: {{Auth::user()->profile->phone_number}}</b></p>
                    <p><b>Experience: {{Auth::user()->profile->experience}}</b></p>
                    <p><b>Biodata: {{Auth::user()->profile->bio}}</b></p>
                    <p><b>Memeber Since:{{date('F d Y',strtotime(Auth::user()->profile->created_at))}}</b></p>
                    @if(!empty(Auth::user()->profile->cover_letter))
                        <p>
                            <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover Letter</a>
                        </p>
                    @else
                        <p>Please Upload Your Cover Letter</p>
                    @endif

                    @if(!empty(Auth::user()->profile->resume))
                        <p>
                            <a href="{{Storage::url(Auth::user()->profile->Resume)}}">Resume</a>
                        </p>
                    @else
                        <p>Please Upload Your Resume</p>
                    @endif

                </div>
            </div>
            
            <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Update Cover Letter</div>
                <div class="card-body">
                    <input type="file" name="cover_letter" class="form-control">
                    <br>
                    <button class="btn btn-primary">Update</button>

                </div>
            </div>
            </form>
            @if($errors->has('cover_letter'))
                            <div class="error" style="color:red">
                            {{$errors->first('cover_letter')}}
                            </div>     
                        @endif
            <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Update Resume</div>
                <div class="card-body">
                    <input type="file" name="resume" class="form-control">
                    <br>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
            </form>
            @if($errors->has('resume'))
                            <div class="error" style="color:red">
                            {{$errors->first('resume')}}
                            </div>     
                        @endif
        </div>
    </div>
</div>
@endsection