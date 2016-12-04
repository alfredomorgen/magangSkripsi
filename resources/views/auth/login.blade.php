@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white;margin-top:30px">


        <div class="row" style="padding:60px; display: inline-block">

            <div class="col l12 push-l6 push-m3">
                <h4 class="col s12 valign blue-text">Login</h4>
                <form class="col s12" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password"
                                       value="{{ old('password') }}">
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <input type="checkbox" id="test6"/>
                    <label for="test6">Remember Me</label>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn">
                                Login
                            </button>

                            <a class="btn amber darken-1" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
