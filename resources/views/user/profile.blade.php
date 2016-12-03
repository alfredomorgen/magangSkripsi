@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Grey navigation panel -->
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>
        <div class="row">
            <div class="col s12">
                <!-- Teal page content  -->
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <div class="card-content grey-text text-darken-2">
                                <div class="row">
                                    <div class="col l3">
                                        <img src="" style="width:150px; height:150px">
                                    </div>
                                    <div class="col s12 m12 l9">
                                        <a class="btn-floating btn-large red right">
                                            <i class="material-icons">mode_edit</i>
                                        </a>
                                        <span class="card-title"><b></b></span>
                                        <h6>Study at </h6>
                                        <h6><i class="tiny material-icons">location_on</i><b> Indonesia</b></h6>
                                        <h6><i class="tiny material-icons">mail</i></h6>
                                        <br>
                                        <div class="right right-align">Show Profile
                                            <div class="switch">
                                                <label>
                                                    Off
                                                    <input type="checkbox">
                                                    <span class="lever"></span>
                                                    On
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs red">
                            <li class="tab col s3"><a class="active white-text" href="#test1">Education</a></li>
                            <li class="tab col s3"><a class="white-text"href="#test2">Languages</a></li>
                            <li class="tab col s3"><a class="white-text"href="#test3">About Me</a></li>
                            {{--<li class="tab col s3"><a href="#test4">Test 4</a></li>--}}
                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <div class="row">
                            <div class="col s12 m12">
                                <ul class="collection with-header grey-text text-darken-2 z-depth-1">
                                    <li class="collection-header blue white-text"><h6><b>Education</b></h6></li>
                                    <li class="collection-item"><p><span style="font-size:1.5em;"></span><br>Bachelor's Degree, Computer Science</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="test2" class="col s12">
                        <div class="row">
                            <div class="col s12 m12">
                                <ul class="collection with-header grey-text text-darken-2 z-depth-1">
                                    <li class="collection-header  cyan darken-1 white-text"><h6><b>Languages</b></h6></li>
                                    <li class="collection-item"><p>
                                        <h6>Bahasa Indonesia</h6>
                                        <h6>English</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="test3" class="col s12">
                        <div class="row">
                            <div class="col s12 m12">
                                <ul class="collection with-header grey-text text-darken-2 z-depth-1">
                                    <li class="collection-header  amber darken-4 white-text"><h6><b>About Me</b></h6></li>
                                    <li class="collection-item">
                                        <p><span style="font-size: 1em">GPA :</span></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
