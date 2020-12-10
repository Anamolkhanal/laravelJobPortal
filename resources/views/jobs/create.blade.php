@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Job Post</div>
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
                                <input type="text" name="title" required class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Roles</label>
                                <input type="text" name="roles" required class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" required class="form-control p_input"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" name="position" required class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                               <select name="category_id" required class="form-control p_input">
                               @foreach(App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                               @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" required class="form-control p_input"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type"  required class="form-control p_input">
                                <option value="fulltime">Full Time</option>
                                <option value="partime">Part Time</option>
                                <option value="casual">Casual</option>
                               </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" required class="form-control p_input">
                                <option value="live">Live</option>
                                <option value="draft">Draft</option>
                               </select>
                             </div>
                            <div class="form-group">
                                <label>Apply Deadline</label>
                                <input type="date" name="last_date"  required class="form-control p_input">
                            </div>
                            <div class="form-group">
                               <button class="btn btn-success">Job Post</button>
                            </div>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection