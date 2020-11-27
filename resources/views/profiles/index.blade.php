@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img style="boarder-radius: 50px" 
            src="{{asset('avatar/apple.png')}}" width="100">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Your Information</div>
                <div class="card-body">
                <form action="{{route('profile.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="from-control" rows="3" name="address"></textarea>    
                    </div>
                    <div class="form-group">
                        <label>Experience</label>
                        <textarea class="from-control" rows="3" name="experience"></textarea>    
                    </div><div class="form-group">
                        <label>BIODATA</label>
                        <textarea class="from-control" rows="3" name="biodata"></textarea>    
                    </div>
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
                <div class="card-header">User Details/div> 
                <div class="card-body">
                    <p><b>Name:</b></p>
                    <p><b>Email:</b></p>
                    <p><b>Address:</b></p>
                    <p><b>Experience:</b></p>
                    <p><b>Biodata:</b></p>
                    <p><b>Memeber Since:</b></p>

        
                </div>
                <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/from-data"></form>
            </div>
            <div class="card">
                <div class="card-header">Update Cover Letter</div>
                <div class="card-body">
                    <input type="file" name="cover_letter" class="form-control">
                    <br>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Update Resume</div>
                <div class="card-body">
                    <input type="file" name="resume" class="form-control">
                    <br>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection