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

    <script type="text/javascript" src="{{ asset('https://code.jquery.com/jquery-2.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{asset('/js/init.js')}}"></script>

</head>
<body style="background-color:#eeeeee">
<nav class="@if(Auth::guest() || Auth::user()->role == \App\Constant::user_jobseeker)  light-blue lighten-1 @elseif(Auth::user()->role == \App\Constant::user_admin) red @else orange darken-3  @endif" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">Magang</a>
        <ul class="right hide-on-med-and-down" >
            @if (Auth::guest())
                {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                <ul id="dropdown2" class="dropdown-content white" style="margin-top:64px;">

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <ul class="dropdown-menu" role="menu" >
                                <li><a href="{{ url('/login/1') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i><h6>As Company</h6></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/login/2') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i><h6>As Jobseeker</h6></a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>

                <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Login <span
                            class="caret"></span><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                <ul id="dropdown3" class="dropdown-content white" style="margin-top:64px;">

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <ul class="dropdown-menu" role="menu" >
                                <li><a href="{{ url('/register/1') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i><h6>Company</h6></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/register/2') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i><h6>Jobseeker</h6></a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>

                <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Register<span
                                class="caret"></span><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
            @else
                <ul id="dropdown2" class="dropdown-content orange lighten-4" style="margin-top:64px;">

                    <ul class="dropdown-menu" role="menu">
                        <li>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
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
                {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                <ul id="dropdown4" class="dropdown-content white" style="margin-top:64px;">

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <ul class="dropdown-menu" role="menu" >
                                <li><a href="{{ url('/login/1') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i><h6>As Company</h6></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/login/2') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i><h6>As Jobseeker</h6></a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>

                <li><a class="dropdown-button" href="#!" data-activates="dropdown4">Login <span
                                class="caret"></span><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                <ul id="dropdown5" class="dropdown-content white" style="margin-top:64px;">

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <ul class="dropdown-menu" role="menu" >
                                <li><a href="{{ url('/register/1') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i><h6>Company</h6></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/register/2') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i><h6>Jobseeker</h6></a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>

                <li><a class="dropdown-button" href="#!" data-activates="dropdown5">Register<span
                                class="caret"></span><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
            @else
                <ul id="dropdown6" class="dropdown-content orange lighten-4" style="margin-top:64px;">

                    <ul class="dropdown-menu" role="menu">
                        <li>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}" class="black-text"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>
                <a class="dropdown-button" href="#!" data-activates="dropdown6">{{ Auth::user()->name }} <span
                            class="caret"></span><i class="mdi-navigation-arrow-drop-down right"></i></a>
            @endif
        </ul>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

@yield('content')
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
@yield('scripts')


</body>
</html>
