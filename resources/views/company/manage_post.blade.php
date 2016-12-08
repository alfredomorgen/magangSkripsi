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
                <h4 class="col s12 valign blue-text">Manage Job</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <ul class="collection z-depth-1 grey-text text-darken-2">
                <table class="centered bordered highlight responsive-table white" style="word-wrap:break-word">
                    <thead>
                    <tr>
                        <th data-field="id">Job Id</th>
                        <th data-field="title">Title Job</th>
                        <th data-field="created_at">Created</th>
                        <th data-field="candidates">Candidates</th>
                        <th data-field="status">Status</th>
                        <th data-field="action" colspan="2">
                            <div align="center">Action</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->id }}</td>
                            <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Job" href="{{url('/job/'.$job->id)}}">{{ $job->title }}</a></td>
                            <td>{{ date('d-m-Y', strtotime($job->created_at))}}</td>
                            <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Candidates" href="#">1</a></td>
                            <td>On Going</td>
                            <td><a class="btn btn-block blue"
                                   href="{{ url('/company/post_job/edit/'.$job->id) }}">Edit</a></td>
                            <td><a class="btn btn-block red"
                                   href="{{ url('/company/post_job/delete/'.$job->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </ul>
            <ul class="pagination center">
                <li class="waves-effect">{{ $jobs->render() }}</li>
            </ul>
        </div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row">
            <div class="col-md-8 col-md-offset-4 center-align">
                <a class="btn btn-block green" href="{{ url('/company/post_job/') }}">Create new Post Job</a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
@endsection


