@extends('layouts.app')
@section('title', $job->company->user->name.' - '.$job->name)
@section('content')
    <div class="container">
        <div class="row">
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card white darken-1 hoverable">
                    <div class="card-content orange darken-1 center white-text">
                        @if(\App\Bookmark::where('user_id', '=', Auth::user()->id)->where('target', '=', $job->id)->where('type', '=', \App\Constant::job)->where('type', '=', \App\Constant::job)->first() == null)
                            <a class="tooltipped btn-floating btn-large waves-effect waves-light grey" data-tooltip="Bookmark Job" href="{{ route('jobseeker.bookmark_add_job', $job->id) }}" style="position: absolute; right: 2%; margin-top: -1.6%;"><i class="material-icons">star</i></a>
                        @else
                            <a class="tooltipped btn-floating btn-large waves-effect waves-light yellow darken-2" data-tooltip="Bookmark Job" href="{{ route('jobseeker.bookmark_remove_job', $job->id) }}" style="position: absolute; right: 2%; margin-top: -1.6%;"><i class="material-icons">star</i></a>
                        @endif
                        <h6>VIEW POST</h6>
                    </div>
                    <div class="card-content grey-text text-darken-2" style="padding-left:50px;padding-right:50px;">
                        <div class="right-align">
                            <a class="grey-text tooltipped right-align" data-position="bottom" data-delay="10" data-tooltip="Deadline Time"><i class="tiny material-icons">schedule </i> {{ $job->created_at}}</a>
                        </div>
                        <div class="center"><h4 class="">{{ $job->name }}</h4></div>
                        <br>
                        <div class="card-action">
                            <h5 class="blue-text">Company</h5>
                            <p>
                                <i class="tiny material-icons">work</i>
                                <a href="{{route('company.index',$job->company->user->id)}}"class="yellow-text text-darken-4 tooltipped" data-position="right" data-delay="10" data-tooltip="View Company">{!!  nl2br($job->company->user->name) !!}</a>
                            </p>
                        </div>
                        <div class="card-action">
                            <h5 class="blue-text">Job Description</h5>
                            <p>{!! nl2br ($job->description) !!}</p>
                        </div>
                        <div class="card-action">
                            <h5 class="blue-text">Benefit</h5>
                            <p>{!! nl2br($job->benefit) !!}</p>
                        </div>
                        <div class="card-action">
                            <h5 class="blue-text">Requirement</h5>
                            <p>{!! nl2br($job->requirement) !!}</p>
                        </div>
                        <div class="card-action">
                            <h5 class="blue-text">Employment Type</h5>
                            <p><i class="tiny material-icons">av_timer</i>@if($job->type == \App\Constant::job_fulltime) Full Time @else Part Time @endif</p>
                        </div>
                        <div class="card-action">
                            <h5 class="blue-text">Salary</h5>
                            <p><i class="tiny material-icons">payment</i> @if($job->salary == \App\Constant::job_paid) Paid @else Not Paid @endif</p>
                        </div>
                        <div class="card-action">
                            <h5 class="blue-text"> Period </h5>
                            <p><i class="tiny material-icons">schedule</i> {!! nl2br($job->period) !!} Months</p>
                        </div>

                        <div class="card-action">
                            <h5 class="blue-text">Company Information</h5>
                            @if($job->company->website!= NULL)
                                <p><i class="tiny material-icons"> language</i><b> Website :</b> {!! nl2br($job->company->website) !!}</p>
                            @endif
                            <p><i class="tiny material-icons">business</i><b> Industry :</b> {!! nl2br($job->company->industry) !!}</p>
                            <p><i class="tiny material-icons">perm_identity</i><b> Company Size :</b> {!! nl2br($job->company->size) !!} Employees</p>

                        </div>

                    </div>
                    <div class="card-action">
                        <h6 class="right-align">
                            <button class="btn btn-default orange waves-effect" id="btnApply">Apply</button>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            @if(Auth::guest())
                $('#btnApply').click(function (event) {
                    event.preventDefault();
                    Materialize.toast('Please login as Jobseeker...', 3000, 'rounded');
                });
            @elseif(Auth::user()->role != \App\Constant::user_jobseeker)
                $('#btnApply').click(function (event) {
                    event.preventDefault();
                    Materialize.toast('Only Jobseeker can apply...', 3000, 'rounded');
                });
            @else
                $('#btnApply').click(function (event) {
                window.location.href += '/apply';
            });
            @endif

            Materialize.toast('{{ session('message') }}', 3000, 'rounded');
        });
    </script>
@endsection


