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
                            <input id="user_name" type="text" class="validate" name="user_name" placeholder="Name"
                                   value="{{ old('user_name') }}">
                            @if ($errors->has('user_name'))
                                <strong>{{ $errors->first('user_name') }}</strong>
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

                    <h6>Upload photo</h6>
                    <div class="file-field input-field">
                    <div class="btn">
                    <span>File</span>
                    <input type="file" name="user_photo" multiple >
                    </div>
                    <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload Image" name="user_photo">
                    </div>
                    @if ($errors->has('user_photo'))
                    <strong>{{ $errors->first('user_photo') }}</strong>
                    @endif
                    </div>

                    <h6>Gender</h6>
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <input name="user_gender" type="radio" checked="chedked" id="gender_male" value="Male"/>
                                <label for="gender_male">Male</label>

                                <input name="user_gender" type="radio" id="gender_female" value="Female"/>
                                <label for="gender_female">Female</label>
                            </p>
                            @if ($errors->has('user_gender'))
                                <strong>{{ $errors->first('user_gender') }}</strong>
                            @endif
                        </div>

                    </div>
                    <h6>Address</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="user_address" name="user_address" class="materialize-textarea"
                                      placeholder="Address">{{ old('user_address') }}</textarea>
                            @if ($errors->has('user_address'))
                                <strong>{{ $errors->first('user_address') }}</strong>
                            @endif
                        </div>

                    </div>

                    <h6>Date of Birth</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="date" class="datepicker" name="user_dob" value="{{ old('user_dob') }}" placeholder="Date of birth">
                            @if ($errors->has('user_dob'))
                                <strong>{{ $errors->first('user_dob') }}</strong>
                            @endif
                        </div>
                    </div>

                    <h6>Phone Number</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="user_phone" name="user_phone" type="text" class="validate"
                                   value="{{ old('user_phone') }}" placeholder="Phone Number">
                            @if ($errors->has('user_phone'))
                                <strong>{{ $errors->first('user_phone') }}</strong>
                            @endif
                        </div>

                    </div>

                    <h6>Last Education/University</h6>
                    <div class="row">
                        <div class="inout-field col s12">
                            <input id="user_last_education" name="user_last_education" type="text" class="validate"
                                   value="{{ old('user_last_education') }}" placeholder="Last Education">
                            @if ($errors->has('user_last_education'))
                                <strong>{{ $errors->first('user_last_education') }}</strong>
                            @endif
                        </div>

                    </div>

                    <h6>Last Work Place</h6>
                    <div class="row">
                        <div class="inout-field col s12">
                            <input id="user_last_work_place" name="user_last_work_place" type="text" class="validate"
                                   value="{{ old('user_last_work_place') }}" placeholder="Last Work Place">
                            @if ($errors->has('user_last_work_place'))
                                <strong>{{ $errors->first('user_last_work_place') }}</strong>
                            @endif
                        </div>

                    </div>

                    <h6>Status</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="user_status">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="intern">Doing an intern</option>
                                <option value="not_intern">Not in intern</option>
                            </select>
                            @if ($errors->has('user_status'))
                                <strong>{{ $errors->first('user_status') }}</strong>
                            @endif
                        </div>

                    </div>

                    <h6>GPA</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="user_gpa" name="user_gpa" class="validate"
                                   value="{{ old('user_gpa') }}" placeholder="Last GPA">
                            @if ($errors->has('user_gpa'))
                                <strong>{{ $errors->first('user_gpa') }}</strong>
                            @endif
                        </div>

                    </div>

                    <h6>Upload CV</h6>
                    <div class="file-field input-field">
                    <div class="btn">
                    <span>File</span>
                    <input type="file" name="user_cv" multiple>
                    </div>
                    <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload CV" name="user_cv">
                    </div>
                    @if ($errors->has('user_cv'))
                    <strong>{{ $errors->first('user_cv') }}</strong>
                    @endif
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


