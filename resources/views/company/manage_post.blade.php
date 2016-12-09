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

    {{--modals--}}
    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn" href="#modalCandidates">Modal</a>

    <!-- Modal Structure -->
    <div id="modalCandidates" class="modal">
        <div class="modal-content">
            <h4>Candidates</h4>
            {{--isi context--}}
            <div class="container" style="background-color: transparent;margin-top:30px">
                <div class="row center">
                    <div class="col l8 push-l2">
                        <h4 class="col s12 valign blue-text">Candidates</h4>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <ul class="collection z-depth-1 grey-text text-darken-2">
                        <table class="centered bordered highlight responsive-table white" style="word-wrap:break-word">
                            <thead>
                            <tr>
                                <th data-field="number">Job Seeker Id</th>
                                <th data-field="created_at">Date Applied</th>
                                <th data-field="created_at">Time Applied</th>
                                <th data-field="name">Name</th>
                                <th data-field="resume">Resume</th>
                                <th data-field="action">
                                    <div align="center">Action</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($transactions as $transaction)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $transaction->jobseeker->id }}</td>--}}
                                    {{--<td>{{ date('d-m-Y', strtotime($transaction->created_at))}}</td>--}}
                                    {{--<td>{{ date('H:i:s', strtotime($transaction->created_at))}}</td>--}}
                                    {{--<td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Profile" href="{{ route('jobseeker.index',$transaction->jobseeker->user->id) }}">{{ $transaction->jobseeker->user->name}}</a></td>--}}
                                    {{--<td><a class="btn btn-block blue" href="{{ route('company.view_candidate_resume',$transaction->jobseeker->id) }}" target="_blank">View Resume</a></td>--}}
                                    {{--@if($transaction->status == \App\Constant::status_inactive)--}}
                                        {{--<td><a class="btn btn-block green" href="{{ route('company.transaction_approve',$transaction->id) }}">Approve</a></td>--}}
                                    {{--@elseif($transaction->status == \App\Constant::status_active)--}}
                                        {{--<td><a class="btn btn-block green"href="{{ route('company.transaction_approve',$transaction->id) }}" disabled>Approve</a></td>--}}
                                    {{--@endif--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}

                                {{--<tr class="modal_row">--}}
                                    {{--<td id="modal_job_id"></td>--}}
                                    {{--<td id="modal_date_applied"></td>--}}
                                    {{--<td id="modal_time_applied"></td>--}}
                                    {{--<td id="modal_name"><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Profile" href=""></a></td>--}}
                                    {{--<td id="modal_resume"><a class="btn btn-block blue" href="" target="_blank">View Resume</a></td>--}}
                                    {{--<td id="modal_approve"><a class="btn btn-block green" href="">Approve</a></td>--}}
                                {{--</tr>--}}
                            </tbody>
                        </table>
                    </ul>
                    <ul class="pagination center">
                        <li class="waves-effect"></li>
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
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
    {{--modals--}}

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
                        <th data-field="name">Title Job</th>
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
                            <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Job" href="{{url('/job/'.$job->id)}}">{{ $job->name }}</a></td>
                            <td>{{ date('d-m-Y', strtotime($job->created_at))}}</td>
                            <td><a class="tooltipped linkCandidates" data-position="bottom" data-delay="50" data-tooltip="View Candidates" job-id="{{ $job->id }}" href="{{ route('company.view_candidate', $job->id) }}">{{$job->transaction->count()}}</a></td>

                            @if($job->status == \App\Constant::status_active )
                            <td class="green-text text-lighten-1"><b> Open </b></td>
                            @elseif($job->status == \App\Constant::status_inactive)
                            <td class="red-text text-lighten-1"><b> Closed </b></td>
                            @endif

                            @if($job->status == \App\Constant::status_active)
                            <td><a class="btn btn-block blue"
                                   href="{{ url('/company/post_job/edit/'.$job->id) }}">Edit</a></td>
                            <td><a class="btn btn-block red"
                                   href="{{ route('company.manage_post_close',$job->id) }}">Close</a>
                            </td>
                            @elseif($job->status == \App\Constant::status_inactive)
                            <td><a class="btn btn-block blue"
                                   href="{{ url('/company/post_job/edit/'.$job->id) }}" disabled>Edit</a></td>
                            <td><a class="btn btn-block red"
                                   href="{{ route('company.manage_post_close',$job->id) }}" disabled>Close</a>
                            </td>
                            @endif
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
        //modals
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();

            $(".linkCandidates").on("click", function(){
                event.preventDefault();
                var job_id = $(this).attr("job-id");
                alert(job_id);
            });
        });

    </script>
@endsection


