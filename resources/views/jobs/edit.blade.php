@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Job Post</div>
                        <div class="card-body"> 
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('jobs.store')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="{{Auth::user()->jobs['title']}}"name="title" class="from-control">
                            </div>
                            <div class="form-group">
                                <label>Roles</label>
                                <input type="text" value="{{Auth::user()->jobs['roles']}}" name="roles" class="from-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="from-control">{{Auth::user()->jobs['description']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" value="{{Auth::user()->jobs['position']}}" name="position" class="from-control">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                               <select name="category_id" class="from-control">
                               @foreach(App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}" {{ $cat->id == Auth::user()->jobs['category_id'] ? 'selected="selected"' : '' }}>{{$cat->name}}</option>
                               @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="from-control">{{Auth::user()->jobs['address']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Type</label>>
                                <select name="type" class="from-control">
                                <option value="Full Time"  {{ "Fulltime" == Auth::user()->jobs['type'] ? 'selected="selected"' : '' }}>Full Time</option>
                                <option value="Part Time"  {{ "Parttime" == Auth::user()->jobs['type'] ? 'selected="selected"' : '' }}>Part Time</option>
                                <option value="Casual" {{ "Casual" == Auth::user()->jobs['type'] ? 'selected="selected"' : '' }} >Casual</option>
                               </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="from-control">
                                <option value="Live"  {{ "Live" == Auth::user()->jobs['status'] ? 'selected="selected"' : '' }}>Live</option>
                                <option value="Draft" {{ "Draft" == Auth::user()->jobs['status'] ? 'selected="selected"' : '' }}>Draft</option>
                               </select>
                             </div>
                            <div class="form-group">
                                <label>Apply Deadline</label>
                                <input type="date" name="last_date" value="{{Auth::user()->jobs['last_date']}}" class="from-control">
                            </div>
                            <div class="form-group">
                               <button class="btn btn-outline-primary">Submit</button>
                            </div>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection