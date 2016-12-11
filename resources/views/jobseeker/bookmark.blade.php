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

    <div class="container">
        <div class="row center">
            <h4 class="col s12 valign white-text">Bookmarks</h4>
        </div>
    </div>

    <ul class="collection z-depth-1 grey-text text-darken-2">
        <table class="centered bordered highlight responsive-table white">
            <thead>
                <tr>
                    <th>Bookmark ID</th>
                    <th>Bookmark Title</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($bookmarks as $bookmark)
                <tr>
                    <td>{{ $bookmark->id }}</td>
                    @if($bookmark->type == \App\Constant::user_company)
                        <td><a href="{{ route('company.index',\App\Company::find($bookmark->target)->user->id ) }}">{{ \App\Company::find($bookmark->target)->user->name }}</a></td>
                    @endif
                    <td>{{ $bookmark->created_at }}</td>
                    <td><a class="waves-effect waves-light btn red" href="">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </ul>

    <ul class="pagination center">
        <li class="waves-effect"></li>
    </ul>
</div>
@endsection