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
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content grey-text text-darken-2">
                        <div class="row">
                            <div class="col l2">
                                @if($user->photo == NULL)
                                    <img src="{{ asset('images/profile_default.jpg') }}" style="width:150px; height:150px">
                                @else
                                    <img src="{{ asset('images/'.$user->photo) }}" style="width:150px; height:150px">
                                @endif
                                <span class="center truncate card-title"><b>{{ $user->name }}</b></span>
                            </div>
                            <div class="col l9">
                                <ul class="collapsible" data-collapsible="expandable">
                                    <li>
                                        <div class="collapsible-header cyan-text hoverable active"><i class="material-icons">contacts</i>Information</div>
                                        <div class="collapsible-body">
                                            <p>
                                                <i class="tiny material-icons">location_on</i> {{ $user->location }}<br>
                                                <i class="tiny material-icons">mail</i> {{ $user->email }}<br>
                                                <i class="tiny material-icons">phone</i> {{ $user->phone }}<br>
                                                <i class="tiny material-icons">label_outline</i> {{ $user->company->industry }}<br>
                                                <i class="tiny material-icons">language</i> {{ $user->company->website }}<br>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header cyan-text hoverable active"><i class="material-icons">receipt</i>Description</div>
                                        <div class="collapsible-body"><p>{{$user->description}}</p></div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header cyan-text hoverable active"><i class="material-icons">list</i>Jobs</div>
                                        <div class="collapsible-body">
                                            <p>
                                                @foreach($jobs as $job)
                                                    {{ $job->name }}<br>
                                                @endforeach
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col l1">
                                @if(Auth::guest())
                                @elseif($user->id == Auth::user()->id)
                                    <a href="{{ route('company.edit', $user->id) }}"
                                       class="btn-floating btn-large red right">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.collapsible').collapsible();
        });
    </script>
@endsection
