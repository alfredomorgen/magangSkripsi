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
            <!-- Grey navigation panel -->
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>
    </div>
    <div class="container" style="background-color: transparent;margin-top:30px">
        @if(session('success'))
            <script>Materialize.toast('{{session('success')}}', 5000, 'rounded');</script>
        @elseif(session('error'))
            <div class="red-text">
                {{session('error')}}
            </div>
        @endif
        <div class="row center">
            <div class="col l8 push-l2">
                <h4 class="col s12 valign white-text">Bookmark Job Seeker</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <ul class="collection z-depth-1 grey-text text-darken-2">
                @foreach($bookmarks as $bookmark)
                <li class="collection-item avatar" style="padding-left:10px">
                    <div class="row" style="margin-bottom:auto">
                        <div class="col m2 l2">
                            @if($bookmark->user->photo == NULL)
                                <img src="{{ asset('images/profile_default.jpg') }}" class="circle" style="width:80px; height:80px">
                            @else
                                <img src="{{ asset('images/'.$user->photo) }}" class="circle" style="width:80px; height:80px">
                            @endif
                        </div>

                        <div class="col m10 l10">
                            <span class="title"><strong>Name :</strong> <i>" {{ $bookmark->user->name }} "</i></span>
                            <p>
                                <a href="#!"><i class="material-icons">equalizer</i></a>
                                @if($bookmark->user->jobseeker->university == NULL)
                                    -
                                @else
                                    {{ $user->jobseeker->university }}
                                @endif
                            </p>
                            <p><a href="#!"><i class="material-icons">location_on</i></a>{{ $job->location}}</p>
                            <a href="{{ url('job/'.$job->id) }}" class="waves-effect waves-light btn orange darken-2">View</a>
                            <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Report">report_problem</i></a>
                            <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Share">person_pin</i></a>
                            <a href="#!"><i class="tooltipped material-icons right" data-tooltip="Add to Saved Jobs">grade</i></a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <ul class="pagination center">
                {{--<li class="waves-effect white">{{ $jobs->render() }}</li>--}}
            </ul>
        </div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row">
            <div class="col-md-8 col-md-offset-4 center-align">
                {{--<a class="btn btn-block green" href="{{ url('/company/post_job/') }}">Create new Post Job</a>--}}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        //modals
        $(document).ready(function () {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            //$('#modalCandidates1').modal('open');
        });
    </script>
@endsection