@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>
        <div class="row">
            <div class="col s12 l12 m12">
                <nav style="background-color: lightblue">
                    <div class="nav-wrapper">
                        <form>
                            <div class="input-field">
                                <input id="search" type="search" required>
                                <label for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </nav>
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
