@extends('layouts.app')

@section('content')

    <div class="container" style="background-color: white;margin-top:30px">

        <div class="row" style="padding:60px;">

            <div class="col l8 push-l2">
                <h4 class="col s12 valign blue-text">Post Job</h4>
                <form class="col s12" method="POST" action="{{ url('/company/post_job') }}" enctype="multipart/form-data" files="true">
                    {{ csrf_field() }}

                    {{--<div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">--}}
                    <h6>Name</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="title" type="text" class="validate" name="title" placeholder="Job Title"
                                   value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <strong>{{ $errors->first('first') }}</strong>
                            @endif
                        </div>
                    </div>
                    {{--</div>--}}


                    <h6>Job Type</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="title" id="title">
                                <option value="0">Part Time</option>
                                <option value="1">Full Time</option>
                            </select>
                        </div>
                    </div>

                    <h6>Salary</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="salary" id="salary">
                                <option value="0">Paid</option>
                                <option value="1">Not Paid</option>
                            </select>
                        </div>
                    </div>


                    <h6>Period</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="period" type="number" class="validate"
                                   name="period" placeholder="In Months"
                                   value="{{ old('period') }}" min="1"> Month(s)
                            @if ($errors->has('period'))
                                <strong>{{ $errors->first('period') }}</strong>
                            @endif
                        </div>
                    </div>

                    <h6>Benefit</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea cols="50" rows="8" name="benefit" id="benefit" class="validate" value="{{ old('benefit') }}" placeholder="Your Benefit(s) here . . ." style="resize:none"></textarea>
                            @if ($errors->has('benefit'))
                                <strong>{{ $errors->first('benefit') }}</strong>
                            @endif
                        </div>
                    </div>

                    <h6>Requirement</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea cols="50" rows="8" name="requirement" id="requirement" class="validate" value="{{ old('requirement') }}" placeholder="Your requirement(s) here . . ." style="resize:none"></textarea>
                            @if ($errors->has('requirement'))
                                <strong>{{ $errors->first('requirement') }}</strong>
                            @endif
                        </div>
                    </div>

                    <h6>Description</h6>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea cols="50" rows="8" name="description" id="description" class="validate" value="{{ old('description') }}" placeholder="Your Description here . . ." style="resize:none"></textarea>
                            @if ($errors->has('description'))
                                <strong>{{ $errors->first('description') }}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-8 col-md-offset-4 center-align">
                        <button type="submit" class="btn blue">
                            Post Job Now
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


