@extends('layouts.app')


@section('content')
    <style>
        ul li span{
            font-size:20px;
        }
        ul li .active{
            padding-left: 8px;
            padding-right:8px;
        }
    </style>
    <div class="container">
        <div class="row">
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>
        <div class="row">
            <div class="col s12 l12 m12">
                <nav style="background-color: white">
                    <div class="nav-wrapper">
                        <form action="{{url('company/searchJobseeker') }}" role="search" accept-charset="UTF-8">
                            <div class="input-field">
                                <input class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Search Jobseeker" name="search" id="search" placeholder="Search a jobseeker" type="search" required>
                                <label for="search"><i class="material-icons grey-text">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        @if(!isset($message))
            @if(isset($search))
                {{$search}}

                <ul class="collection z-depth-1 grey-text text-darken-2">
                    <table class="centered bordered highlight responsive-table white">
                        <thead>
                        <tr>
                            <th data-field="photo">Photo</th>
                            <th data-field="jobseeker">Jobseeker Name</th>
                            <th data-field="university">University</th>
                            <th data-field="major">Major</th>
                            <th data-field="email">Email</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>
                                    @if($user->photo == NULL)
                                        <img src="{{ asset('images/profile_default.jpg') }}" class="circle" style="width:80px; height:80px">
                                    @else
                                        <img src="{{ asset('images/'.$user->photo) }}" class="circle" style="width:80px; height:80px">
                                    @endif
                                </td>
                                <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Profile" href="{{ route('jobseeker.index', $user->id) }}">{{ $user->name }}</a></td>
                                <td>
                                    @if($user->jobseeker->university == NULL)
                                        -
                                    @else
                                        {{ $user->jobseeker->university }}
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
                <ul class="pagination center">
                    <li class="waves-effect white">{{ $users->render() }}</li>
                </ul>
            @else
                <ul class="collection z-depth-1 grey-text text-darken-2">
                    <table class="centered bordered highlight responsive-table white">
                        <thead>
                        <tr>
                            <th data-field="photo">Photo</th>
                            <th data-field="jobseeker">Jobseeker Name</th>
                            <th data-field="university">University</th>
                            <th data-field="major">Major</th>
                            <th data-field="email">Email</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>
                                    @if($user->photo == NULL)
                                        <img src="{{ asset('images/profile_default.jpg') }}" class="circle" style="width:80px; height:80px">
                                    @else
                                        <img src="{{ asset('images/'.$user->photo) }}" class="circle" style="width:80px; height:80px">
                                    @endif
                                </td>
                                <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Profile" href="{{ route('jobseeker.index', $user->id) }}">{{ $user->name }}</a></td>
                                <td>
                                    @if($user->jobseeker->university == NULL)
                                        -
                                    @else
                                        {{ $user->jobseeker->university }}
                                    @endif
                                </td>
                                <td>
                                    @if($user->jobseeker->major == NULL)
                                        -
                                    @else
                                        {{ $user->jobseeker->major }}
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
                <ul class="pagination center">
                    <li class="waves-effect white">{{ $users->render() }}</li>
                </ul>
            @endif
        @else
            {{$message}}
        @endif
    </div>

    </div>
    </div>
@endsection
