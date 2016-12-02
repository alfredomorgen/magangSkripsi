@extends('layouts.app')

@section('content')

    <div class="container" style="background-color: white;margin-top:30px">

        <div class="row" style="padding:60px;">

            <div class="col l8 push-l2">
                <h4 class="col s12 valign blue-text">Register</h4>
                <form class="col s12" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data" files="true">
                    {{ csrf_field() }}

                    {{--<div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">--}}
                    <h6>Name</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" class="validate" name="name" placeholder="Name"
                                   value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <strong>{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                    </div>
                    {{--</div>--}}


                    <h6>Email</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" placeholder="Email"
                                   value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                    </div>

                    <h6>Password</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password"
                                   placeholder="Password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <strong>{{ $errors->first('password') }}</strong>
                            @endif
                        </div>
                    </div>


                    <h6>Password Confirmation</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password_confirmation" type="password" class="validate"
                                   name="password_confirmation" placeholder="Confirm Password"
                                   value="{{ old('password_confirmation') }}">
                            @if ($errors->has('password_confirmation'))
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <select id="role" name="role">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="{{\App\Constant::user_jobseeker}}">Jobseeker</option>
                            <option value="{{\App\Constant::user_company}}">Company</option>
                        </select>
                        <label>Materialize Select</label>
                    </div>


                    <div class="col-md-8 col-md-offset-4 center-align">
                        <button type="submit" class="btn blue">
                            Register
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
@endsection


