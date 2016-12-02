@extends('layouts.app')


@section('content')
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
                        <form action="{{url('admin/search') }}" role="search" accept-charset="UTF-8">
                            <div class="input-field">
                                <input name="search" id="search" placeholder="Search a company" type="search" required>
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
                    <table class="centered white">
                        <thead>
                        <tr>
                            <th data-field="photo">Photo</th>
                            <th data-field="id">Id</th>
                            <th data-field="company">Company</th>
                            <th data-field="email">Email</th>
                            <th data-field="action">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($companies as $company)
                            <tr>
                                <td></td>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><a class="waves-effect waves-light btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
                <ul class="pagination center">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="waves-effect">{{ $companies->render() }}</li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            @endif
            @else
            {{$message}}
        @endif
    </div>

    </div>
    </div>
@endsection
