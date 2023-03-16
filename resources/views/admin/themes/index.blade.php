@extends('layout')
@section('content')
<h1 class="m-5 text-center">Theme index</h1>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Themes</li>
        </ol>
    </nav>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <nav class="mb-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.themes.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.themes.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <table class="table table-striped text-center" id="ThemesTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach($themes as $theme)
            <tr>
                <th scope="row">{{$theme->id}}</th>
                <td>{{$theme->name}}</td>
                <td><a class="btn btn-sm btn-primary" href="{{route('admin.themes.edit', ['theme' => $theme->id])}}">Edit</a></td>
                <td><a class="btn btn-sm btn-danger" href="{{route('admin.themes.delete', ['theme' => $theme->id])}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/tables/themes.table.js')}}"></script>
@endsection