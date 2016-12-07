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
    <div class="container" style="background-color: transparent;margin-top:30px">
        <div class="row center">
            <div class="col l8 push-l2">
                <h4 class="col s12 valign blue-text">View Posts</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">{{ $job->title }}</span>
                        <p>{!! nl2br($job->description) !!}</p>
                    </div>
                    <div class="card-action">
                        <h6 class="right-align"><a href="{{ url('job/'.$job->id.'/apply') }}" id="btnApply">Apply</a></h6>
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
            @endif
        });
    </script>
@endsection


