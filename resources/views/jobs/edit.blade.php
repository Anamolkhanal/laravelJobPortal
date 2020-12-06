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
                                <input type="text" value="{{$job->title}}"name="title" class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Roles</label>
                                <input type="text" value="{{$job->roles}}" name="roles" class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control p_input">{{$job->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" value="{{$job->position}}" name="position" class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                               <select name="category_id" class="form-control p_input">
                               @foreach(App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}" {{ $cat->id == $job->category_id ? 'selected="selected"' : '' }}>{{$cat->name}}</option>
                               @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control p_input">{{$job->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Type</label>>
                                <select name="type" class="form-control p_input">
                                <option value="Full Time"  {{ "Fulltime" == $job->type ? 'selected="selected"' : '' }}>Full Time</option>
                                <option value="Part Time"  {{ "Parttime" == $job->type ? 'selected="selected"' : '' }}>Part Time</option>
                                <option value="Casual" {{ "Casual" == $job->type ? 'selected="selected"' : '' }} >Casual</option>
                               </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control p_input">
                                <option value="Live"  {{ "Live" == $job->status ? 'selected="selected"' : '' }}>Live</option>
                                <option value="Draft" {{ "Draft" == $job->status ? 'selected="selected"' : '' }}>Draft</option>
                               </select>
                             </div>
                            <div class="form-group">
                                <label>Apply Deadline</label>
                                <input type="date" name="last_date" value="{{$job->last_date}}" class="form-control p_input">
                            </div>
                            <div class="form-group">
                               <button class="btn btn-success">Update Post</button>
                            </div>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection