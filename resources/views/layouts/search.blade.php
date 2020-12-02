<form action="#" method="GET" style="margin-top: 20px;">
    <select name="job_id" id="input_title">
        {{-- <option value="0">Select Job Title</option>
        @foreach (\App\Job::select('id','title')->get() as $job)
            <option value="{{ $job->id }}" {{ $job->id == $selected_id['job_id'] ? 'selected' : '' }}>
            {{ $job['title'] }}
            </option>
        @endforeach --}}
    </select>
    <select name="job_address" id="input_address">
        <option value="0">Select Address</option>
        {{-- @foreach (\App\Job::select('id','address')->get() as $job)
            <option value="{{ $job->id }}" {{ $job->id == $selected_id['job_id'] ? 'selected' : '' }}>
            {{ $job['address'] }}
            </option>
        @endforeach --}}
    </select>
    <select name="job_category" id="input_category">
        <option value="0">Select Category</option>
        {{-- @foreach (\App\Job::select('id','category_id')->get() as $job)
            <option value="{{ $job->id }}" {{ $job->id == $selected_id['job_id'] ? 'selected' : '' }}>
            {{ $job['category_id'] }}
            </option> --}}
        @endforeach
    </select>
    <select name="job_type" id="input_type">
        <option value="0">Select Category</option>
        {{-- @foreach (\App\Job::select('id','type')->get() as $job)
            <option value="{{ $job->id }}" {{ $job->id == $selected_id['job_id'] ? 'selected' : '' }}>
            {{ $job['type'] }}
            </option> --}}
        @endforeach
    </select>

    <input type="submit" class="btn btn-danger btn-sm" value="Filter">
    </form>