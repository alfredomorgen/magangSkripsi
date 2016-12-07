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
                        <form action="{{url('admin/searchJob') }}" role="search" accept-charset="UTF-8">
                            <div class="input-field">
                                <input class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Search Job" name="search" id="search" placeholder="Search a job" type="search" required>
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
                            <th data-field="id">Id</th>
                            <th data-field="company_name">Company Name</th>
                            <th data-field="job">Title</th>
                            <th data-field="email">Created Date</th>
                            <th data-field="action">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->id }}</td>
                                <td>{{ $job->company->user->name}}</td>
                                <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Job" href="{{url('/admin/view_job/'.$job->id)}}">{{ $job->title }}</a></td>
                                <td>{{ $job->created_at }}</td>
                                <td><a class="waves-effect waves-light btn btn-danger" href="{{url('/admin/delete_job/'.$job->id)}}">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
                <ul class="pagination center">
                    <li class="waves-effect">{{ $jobs->render() }}</li>
                </ul>
            @else
                <ul class="collection z-depth-1 grey-text text-darken-2">
                    <table class="centered bordered highlight responsive-table white">
                        <thead>
                        <tr>
                            <th data-field="id">Id</th>
                            <th data-field="company_name">Company Name</th>
                            <th data-field="job">Title</th>
                            <th data-field="email">Created Date</th>
                            <th data-field="action">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->id }}</td>
                                <td>{{ $job->company->user->name }}</td>
                                <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View job" href="{{url('/admin/view_job/'.$job->id)}}">{{ $job->title }}</a></td>
                                <td>{{ $job->created_at }}</td>
                                <td><a class="waves-effect waves-light btn btn-danger" href="{{url('/admin/delete_job/'.$job->id)}}">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
                <ul class="pagination center">
                    <li class="waves-effect">{{ $jobs->render() }}</li>
                </ul>
            @endif
        @else
            {{$message}}
        @endif
    </div>

    </div>
    </div>
@endsection
