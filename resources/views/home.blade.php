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
                <!-- Teal page content  -->

                <div class="row">
                    <div class="col l12">
                        <div class="card-panel content ">
                            <div class="row" style="margin-bottom: 0px">
                                <div class="input-field col s5 m5 l5">

                                    <input id="icon_prefix" type="text" class="validate">
                                    <label for="icon_prefix">Title Jobs</label>
                                </div>
                                <div class="input-field col s4 m4 l4">

                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Location</label>
                                </div>
                                <div class="input-field col s1 m2 l2">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Find

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <ul class="collection z-depth-1 grey-text text-darken-2">
                    <li class="collection-item avatar" style="padding-left:10px">
                        <div class="row" style="margin-bottom:auto">
                            <div class="col m2 l2">
                                <img src="images/samsung.png" alt="" class="rounded" style="width:70px; height:70px">
                            </div>
                            <div class="col m10 l10">
                                <span class="title">Project Manager</span>
                                <p><a href="#!"><i class="material-icons">equalizer</i></a>SAMSUNG<br>
                                    <a href="#!"><i class="material-icons">location_on</i></a>Jakarta Barat
                                </p>
                                <a class="waves-effect waves-light btn orange darken-2">View</a>
                                <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Report">report_problem</i></a>
                                <a href="#!"><i class="tooltipped material-icons right"
                                                data-tooltip="Share">person_pin</i></a>
                                <a href="#!"><i class="tooltipped material-icons right"
                                                data-tooltip="Add to Saved Jobs">grade</i></a>

                            </div>
                        </div>
                    </li>
                    <li class="collection-item avatar" style="padding-left:10px">
                        <div class="row" style="margin-bottom:auto">
                            <div class="col l2">
                                <img src="images/google.jpg" alt="" class="rounded" style="width:60px; height:60px">
                            </div>
                            <div class="col l10">
                                <span class="title">IT Consultant</span>
                                <p><a href="#!"><i class="material-icons">equalizer</i></a>Google.Inc<br>
                                    <a href="#!"><i class="material-icons">location_on</i></a>Jakarta Pusat
                                </p>
                                <a class="waves-effect waves-light btn orange darken-2">View</a>
                                <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Report">report_problem</i></a>
                                <a href="#!"><i class="tooltipped material-icons right"
                                                data-tooltip="Share">person_pin</i></a>
                                <a href="#!"><i class="tooltipped material-icons right"
                                                data-tooltip="Add to Saved Jobs">grade</i></a>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item avatar" style="padding-left:10px">
                        <div class="row" style="margin-bottom:auto">
                            <div class="col l2">
                                <img src="images/google.jpg" alt="" class="rounded" style="width:60px; height:60px">
                            </div>
                            <div class="col l10">
                                <span class="title">IT Consultant</span>
                                <p><a href="#!"><i class="material-icons">equalizer</i></a>Google.Inc<br>
                                    <a href="#!"><i class="material-icons">location_on</i></a>Jakarta Pusat
                                </p>
                                <a class="waves-effect waves-light btn orange darken-2">View</a>
                                <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Report">report_problem</i></a>
                                <a href="#!"><i class="tooltipped material-icons right"
                                                data-tooltip="Share">person_pin</i></a>
                                <a href="#!"><i class="tooltipped material-icons right"
                                                data-tooltip="Add to Saved Jobs">grade</i></a>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item avatar" style="padding-left:10px">
                        <div class="row" style="margin-bottom:auto">
                            <div class="col l2">
                                <img src="images/google.jpg" alt="" class="rounded" style="width:60px; height:60px">
                            </div>
                            <div class="col l10">
                                <span class="title">IT Consultant</span>
                                <p><a href="#!"><i class="material-icons">equalizer</i></a>Google.Inc<br>
                                    <a href="#!"><i class="material-icons">location_on</i></a>Jakarta Pusat
                                </p>
                                <a class="waves-effect waves-light btn orange darken-2">View</a>
                                <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Report">report_problem</i></a>
                                <a href="#!"><i class="tooltipped material-icons right"
                                                data-tooltip="Share">person_pin</i></a>
                                <a href="#!"><i class="tooltipped material-icons right"
                                                data-tooltip="Add to Saved Jobs">grade</i></a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="pagination center">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
