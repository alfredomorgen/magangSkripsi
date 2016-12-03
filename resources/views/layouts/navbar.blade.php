{{--<ul class="collapsible">--}}
    {{--<li><a href="{!! route('home') !!}" class="collapsible-header grey-text text-darken-1"><i--}}
                    {{--class="tiny material-icons">tab</i><b>Home</b></a></li>--}}
    {{--<li><a href="#!" class="collapsible-header grey-text text-darken-1"><i class="tiny material-icons">perm_identity</i><b>Companies</b></a>--}}
    {{--</li>--}}
    {{--@if(Auth::guest())--}}

    {{--@else--}}
    {{--<li><a href="{!! route('user.show',Auth::user()->id) !!}"--}}
           {{--class="collapsible-header grey-text text-darken-1"><i class="tiny material-icons">receipt</i><b>--}}
                {{--Application</b></a></li>--}}
    {{--@endif--}}
    {{--<li><a href="#!" class="collapsible-header grey-text text-darken-1"><i class="tiny material-icons">view_list</i><b>--}}
                {{--Saved Jobs</b></a></li>--}}
    {{--<li><a href="#!" class="collapsible-header grey-text text-darken-1"><i class="tiny material-icons">help</i><b>--}}
                {{--Help</b></a></li>--}}

{{--</ul>--}}
<div class="nav-extended">
<div class="nav-wrapper">
    <ul class="tabs tabs-transparent z-depth-1" >
        <li class="tab"><a target="_self"href="{{url('/home')}}" style="color:#757575">Home</a></li>
        <li class="tab"><a href="#test2" style="color:#757575">Search Company</a></li>
        <li class="tab"><a href="#test3" style="color:#757575">Bookmark</a></li>
        @if(Auth::guest())

        @else
            <li class="tab"><a target="_self" href="{{ Auth::user()->id }}" style="color:#757575">Profile</a></li>
        @endif
        <li class="tab"><a href="#test3" style="color:#757575">Applied Jobs </a></li>

    </ul>

</div>
</div>

