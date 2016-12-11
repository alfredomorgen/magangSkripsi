@extends('layouts.app')
@section('title', $user->name)
@section('content')
    <div class="container">
        <div class="row">
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>
        @if(session('success'))
            <script>Materialize.toast('{{session('success')}}', 5000, 'rounded');</script>
        @elseif(session('error'))
            <div class="red-text">
                {{session('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <div class="card-content grey-text text-darken-2">
                                <div class="row">
                                    @if(Auth::user()->role == \App\Constant::user_company)
                                        <div class="right-align">
                                            @if(\App\Bookmark::where('target','=',\App\User::find($user->id)->jobseeker->id)
                                                ->where('user_id','=',Auth::user()->id)
                                                ->first() == null)
                                                <a class="tooltipped btn-floating btn-small waves-effect waves-light grey" data-tooltip="Bookmark Company" href="{{ route('company.add_bookmark_jobseeker',$user->id) }}"><i class="small material-icons">star</i></a>
                                            @else
                                                <a class="tooltipped btn-floating btn-small waves-effect waves-light yellow" data-tooltip="Bookmark Company" href="{{ route('company.remove_bookmark_jobseeker',$user->id) }}"><i class="small material-icons">star</i></a>
                                            @endif
                                        </div>
                                    @endif
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
                                            <a href="{{ route('jobseeker.edit', $user->id) }}" class="btn-floating btn-large red right">
                                                <i class="material-icons">mode_edit</i>
                                            </a>
                                        @endif
                                        <span class="card-title"><b>{{ $user->name }}</b></span>
                                        <h6>Study at</h6>
                                        <h6><i class="tiny material-icons">location_on</i> Indonesia</h6>
                                        <h6><i class="tiny material-icons">mail</i> {{ $user->email }}</h6>
                                        <h6><i class="tiny material-icons">phone</i> {{ $user->phone }}</h6>
                                        <p>
                                            {{ $user->description }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs red">
                            <li class="tab col s3"><a class="active white-text" href="#test1">Education</a></li>
                            <li class="tab col s3"><a class="white-text" href="#test2">Languages</a></li>
                            <li class="tab col s3"><a class="white-text" href="#test3">About Me</a></li>
                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <div class="row">
                            <div class="col s12 m12">
                                <ul class="collection with-header grey-text text-darken-2 z-depth-1">
                                    <li class="collection-header blue white-text"><h6><b>Education</b></h6></li>
                                    <li class="collection-item"><p><span style="font-size:1.5em;"></span><br>Bachelor's
                                            Degree, Computer Science</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="test2" class="col s12">
                        <div class="row">
                            <div class="col s12 m12">
                                <ul class="collection with-header grey-text text-darken-2 z-depth-1">
                                    <li class="collection-header  cyan darken-1 white-text"><h6><b>Languages</b></h6>
                                    </li>
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
                                    <li class="collection-header  amber darken-4 white-text"><h6><b>About Me</b></h6>
                                    </li>
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

@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $('#btnBookmark').click(function (event)
            {
                window.location.href += '/add_bookmark_jobseeker';
            });

            Materialize.toast('{{ session('message') }}', 5000, 'rounded');
        });
    </script>
@endsection
