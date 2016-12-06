<style>
    .tabs .indicator{
        background-color: white;
    }
</style>
<div class="nav-extended">
    <div class="nav-wrapper">
        <ul class="tabs tabs-fixed-width z-depth-1">

            @if(Auth::guest())
                <li class="tab"><a target="_self" href="{{url('/')}}" style="color:#757575">Home</a></li>
                <li class="tab"><a href="#test2" style="color:#757575">Search Company</a></li>
            @elseif(Auth::user()->role == '0')
                <li class="tab"><a target="_self" href="{{url('/home')}}" style="color:#757575">Home</a></li>
                <li class="tab"><a target="_self" href="{{url('/admin/search_jobseeker') }}" style="color:#757575">Search Jobseeker</a></li>
                <li class="tab"><a target="_self" href="{{url('/admin/search_company')}}" style="color:#757575">Search Company</a></li>
                <li class="tab"><a target="_self" href="{{url('/admin/search_job')}}" style="color:#757575">Search Job</a></li>
            @elseif(Auth::user()->role == '1')
                <li class="tab"><a target="_self" href="{{url('/home')}}" style="color:#757575">Home</a></li>
                <li class="tab"><a href="#test2" style="color:#757575">Search User</a></li>
                <li class="tab"><a href="#test3" style="color:#757575">Bookmark Users</a></li>
                <li class="tab"><a target="_self" href="{{ url('/company/view/post_job') }}" style="color:#757575">View Posts</a></li>
                <li class="tab"><a target="_self" href="{{ url('/company/manage_post') }}" style="color:#757575">Manage Posts</a></li>
                <li class="tab"><a target="_self" href="{{ url('/'.Auth::user()->id ) }}" style="color:#757575">Profile</a></li>
            @elseif(Auth::user()->role == '2')
                <li class="tab"><a target="_self" href="{{url('/home')}}" style="color:#757575">Home</a></li>
                <li class="tab"><a href="#test2" style="color:#757575">Search Company</a></li>
                <li class="tab"><a href="#test3" style="color:#757575">Bookmark Jobs</a></li>
                <li class="tab"><a target="_self" href="{{ url('/'.Auth::user()->id) }}" style="color:#757575">Profile</a></li>
                <li class="tab"><a target="_self" href="{{url('/')}}" style="color:#757575">Applied Jobs </a></li>
            @endif

        </ul>
    </div>
</div>

