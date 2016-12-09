@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>

        <div class="row">
            <div class="s12">
                <div class="col l12">
                    <div class="card-panel content ">
                        <div class="row" style="margin-bottom: 0px">
                            <div class="section">
                                <h5 class="center-align">Edit Profile</h5>
                            </div>

                            <form class="col s12" method="POST" action="{{ route('company.update', $user->id) }}" enctype="multipart/form-data" files="true">
                                {{ csrf_field() }}

                                <h6>Password</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="password" placeholder="Password">
                                        @if ($errors->has('password'))
                                            <strong>{{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <h6>Confirm Password</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password_confirm" type="password" name="password_confirm"
                                               placeholder="Confirm Password">
                                        @if ($errors->has('password_confirm'))
                                            <strong>{{ $errors->first('password_confirm') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <h6>Phone</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="phone" type="text" name="phone" value="{{ $user->phone }}" placeholder="Phone">
                                        @if ($errors->has('phone'))
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <h6>Description</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea class="materialize-textarea" id="description" name="description" placeholder="Description">{{ $user->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <strong>{{ $errors->first('description') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <h6>Photo</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>File</span>
                                                <input id="photo" type="file" name="photo">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        @if ($errors->has('photo'))
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8 col-md-offset-4 center-align">
                                    <button type="submit" class="btn blue">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
