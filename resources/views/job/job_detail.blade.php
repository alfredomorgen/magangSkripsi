@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Grey navigation panel -->
            @section('navbar')
                @include('layouts.navbar')
            @show
        </div>
    </div>
    {{--<div class="container" style="background-color: transparent;margin-top:30px">--}}
        {{--<div class="row center">--}}
            {{--<div class="col l8 push-l2">--}}
                {{--<h4 class="col s12 valign blue-text">View Posts</h4>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-2">
                        <div class="center"><h4 class="">{{ $job->title }}</h4></div>
                        <h5>Company</h5>
                        <p>{!!  nl2br($job->company->user->name) !!}</p>
                        <h5>Job Description</h5>
                        <p>{!! nl2br ($job->description) !!}</p>
                        <h5>Benefit</h5>
                        <p>{!! nl2br($job->benefit) !!}</p>
                        <h5>Requirement</h5>
                        <p>{!! nl2br($job->requirement) !!}</p>
                        <h5>Employment Type</h5>
                        <p>@if($job->type =='0') Full Time @else Part Time @endif</p>
                    </div>
                    <div class="card-action">
                        <h6 class="right-align"><button class="btn btn-default" id="btnApply">Apply</button></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            @if(Auth::user()->role != \App\Constant::user_jobseeker)
                $('#btnApply').click(function (event) {
                    event.preventDefault();
                    Materialize.toast('Only Jobseeker can apply', 3000, 'rounded');
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


