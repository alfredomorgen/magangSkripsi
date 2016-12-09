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
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <div class="card-content grey-text text-darken-2">
                                <div class="row">
                                    <div class="col l3">
                                        @if($user->photo == NULL)
                                            <img src="{{ asset('images/profile_default.jpg') }}" style="width:150px; height:150px">
                                        @else
                                            <img src="{{ asset('images/'.$user->photo) }}" style="width:150px; height:150px">
                                        @endif
                                    </div>
                                    <div class="col s12 m12 l9">
                                        @if(Auth::guest())
                                        @elseif($user->id == Auth::user()->id)
                                            <a href="{{ route('company.edit', $user->id) }}" class="btn-floating btn-large red right">
                                                <i class="material-icons">mode_edit</i>
                                            </a>
                                        @endif
                                        <span class="card-title"><b>{{ $user->name }}</b></span>
                                        <h6>Study at</h6>
                                        <h6><i class="tiny material-icons">location_on</i> {{ $user->address }}</h6>
                                        <h6><i class="tiny material-icons">mail</i> {{ $user->email }}</h6>
                                        <h6><i class="tiny material-icons">phone</i> {{ $user->phone }}</h6>
                                        <p>{{ $user->description }}</p>
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
            </div>
        </div>
    </div>
@endsection
