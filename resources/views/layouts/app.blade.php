<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}" media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body style="background-color:#eeeeee">
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">Magang</a>
        <ul class="right hide-on-med-and-down">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <ul id="dropdown2" class="dropdown-content amber darken-3" style="margin-top:64px;">

                    <ul class="dropdown-menu" role="menu">
                        <li>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>
                <a class="dropdown-button" href="#!" data-activates="dropdown2">{{ Auth::user()->name }} <span
                            class="caret"></span><i class="mdi-navigation-arrow-drop-down right"></i></a>

            @endif
        </ul>

        <ul id="nav-mobile" class="side-nav">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

{{--<div class="nav-wrapper container">--}}
{{--<ul class="tabs tabs-transparent" >--}}
{{--<li class="tab"><a href="#test1" style="color:#757575">Home</a></li>--}}
{{--<li class="tab"><a class="active" href="#test2" style="color:#757575">Search Company</a></li>--}}
{{--<li class="tab"><a href="#test3" style="color:#757575">Bookmark</a></li>--}}
{{--@if(Auth::guest())--}}

{{--@else--}}
{{--<li class="tab"><a href="{!! route('user.show',Auth::user()->id) !!}" style="color:#757575">Profile</a></li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}


@yield('content')


        <!-- Scripts -->
<script type="text/javascript" src="{{ asset('https://code.jquery.com/jquery-2.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script src="{{asset('/js/init.js')}}"></script>

@yield('scripts')


</body>
</html>
