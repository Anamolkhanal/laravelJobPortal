<li class="">
        <a href="{{route('jobs.create')}}"><i class="fa fa-post-o"></i><span>Job Post</span></a>
</li>
<li >
        <a href="{{route('company.profile')}}"><i class="fa fa-post-o"></i><span>Profile</span></a>
</li>
<li >
        <a href="{{route('company.application')}}"><i class="fa fa-post-o"></i><span>Total Application</span></a>
</li>
<li >
        <a href="{{route('company.index',[Auth::user()->company->id,Auth::user()->company->cname])}}"><i class="fa fa-post-o"></i><span>Company Page</span></a>
</li>
<li >
        <a href="#"><i class="fa fa-post-o"></i><span>Message</span></a>
</li>
<!-- {{ Request::is('news*') ? 'active' : '' }} -->