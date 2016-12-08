@extends('layouts.app')

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
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-2" style="padding-left:50px;padding-right:50px;">
                        <div class="center"><h4 class="">{{ $job->title }}</h4></div><br>
                        <h5>Company</h5>
                        <p><a href="{{route('user.index',$job->company->user->id)}}">{!!  nl2br($job->company->user->name) !!}</a></p><br>
                        <h5>Job Description</h5>
                        <p>{!! nl2br ($job->description) !!}</p><br>
                        <h5>Benefit</h5>
                        <p>{!! nl2br($job->benefit) !!}</p><br>
                        <h5>Requirement</h5>
                        <p>{!! nl2br($job->requirement) !!}</p><br>
                        <h5>Employment Type</h5>
                        <p>@if($job->type =='0') Full Time @else Part Time @endif</p><br>
                        @if($job->company->website!= NULL)
                            <h5>Website</h5>
                            <p>{!! nl2br($job->company->website) !!}</p>
                        @endif
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


