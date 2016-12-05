@extends('layouts.app')

@section('content')
    <div class="valign-wrapper" style="margin-top:70px">

        <div class="row z-depth-3" style="background-color: white; width:280px;">

            <div class="col l12">
                <h4 class="col s12 valign blue-text center">Login</h4>
                <form class="col s12" style="padding-bottom:20px;" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">perm_identity</i>
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
                        <div class="row" style="margin:0px;">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_outline</i>
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

                    <div class="row">
                        <div class="col s12 m12 l12" style="margin-left:5px;">
                            <input type="checkbox" id="test6"/>
                            <label for="test6">Remember Me</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l12 m12 s12">
                            <button type="submit" class="btn" style="width:100%">
                                Login
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <a class="" style="font-size: 12px;" href="{{ url('/password/reset') }}">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
