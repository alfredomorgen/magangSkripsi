@extends('layouts.app')

@section('content')

    <div class="container" style="background-color: white;margin-top:30px">

        <div class="row" style="padding:60px;">
            <div class="col l8 push-l2">
                <h4 class="col s12 valign blue-text">Manage Job</h4>
                <div class="row"></div>
                <div class="row"></div>
                <table class="striped responsive-table">
                    <thead>
                    <tr>
                        <th data-field="title">Title Job</th>
                        <th data-field="created_at">Created</th>
                        <th data-field="candidates">Candidates</th>
                        <th data-field="status">Status</th>
                        <th colspan="2" data-field="action">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ date('d-m-Y', strtotime($job->created_at))}}</td>
                            <td>$0.87</td>
                            <td>On Going</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination center">
                    <b>{{$jobs->render()}}</b>

                </div>
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


