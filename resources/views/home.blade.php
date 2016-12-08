@extends('layouts.app')

@section('content')
    <style>
        ul li span {
            font-size: 20px;
        }

        ul li .active {
            padding-left: 8px;
            padding-right: 8px;
        }
    </style>
    <div class="container">
        <div class="row">
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>

        <div class="row">
            <div class="s12">
                <div class="row">
                    <div class="col l12 m12 s12">
                        <div class="card-panel content ">
                            <div class="row" style="margin-bottom: 0px">
                                <div class="input-field col s5 m5 l5">
                                    <input id="icon_prefix" type="text" class="validate">
                                    <label for="icon_prefix">Title Jobs</label>
                                </div>
                                <div class="input-field col s4 m5 l5">
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Location</label>
                                </div>
                                <div class="input-field col s3 m2 l2">
                                    <button class="btn waves-effect waves-light" style="width:100%"type="submit" name="action">Find</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="collection z-depth-1 grey-text text-darken-2">
                    @foreach($jobs as $job)
                        <li class="collection-item avatar" style="padding-left:10px">
                            <div class="row" style="margin-bottom:auto">
                                <div class="col m2 l2">
                                    <img src="{{ $job->company->user->photo }}" class="rounded" style="width:70px; height:70px">
                                </div>
                                <div class="col m10 l10">
                                    <span class="title">{{ $job->title }}</span>
                                    <p><a href="#!"><i class="material-icons">equalizer</i></a>{{ $job->company->name }}</p>
                                    <p><a href="#!"><i class="material-icons">location_on</i></a>{{ $job->company->address }}</p>
                                    <a href="{{ url('job/'.$job->id) }}" class="waves-effect waves-light btn orange darken-2">View</a>
                                    <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Report">report_problem</i></a>
                                    <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Share">person_pin</i></a>
                                    <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Add to Saved Jobs">grade</i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                {{--<ul class="pagination center">--}}
                    {{--<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>--}}
                    {{--<li class="active"><a href="#!">1</a></li>--}}
                    {{--<li class="waves-effect"><a href="#!">2</a></li>--}}
                    {{--<li class="waves-effect"><a href="#!">3</a></li>--}}
                    {{--<li class="waves-effect"><a href="#!">4</a></li>--}}
                    {{--<li class="waves-effect"><a href="#!">5</a></li>--}}
                    {{--<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>--}}
                {{--</ul>--}}

                <ul class="pagination center">
                    <li class="waves-effect">{{ $jobs->render() }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
