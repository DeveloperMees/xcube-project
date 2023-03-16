@extends('layout')
@section('content')
<h1 class="m-5 text-center">Cube index</h1>

<div class="container">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Cubes</li>
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
                <a class="nav-link active" href="#">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.cubes.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <table class="table table-striped text-center" id="CubesTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Preview</th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Theme</th>
                <th scope="col">Details</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cubes as $cube)
            <tr>
                <td><img class="table_img" src="{{asset('storage/'.$cube->file_path)}}"></td>
                <th scope="row">{{$cube->id}}</th>
                <td>{{$cube->name}}</td>
                <td>{{$cube->theme->name}}</td>
                <td><a class="btn btn-sm btn-primary" href="{{route('admin.cubes.show', ['cube' => $cube->id])}}">Details</a></td>
                <td><a class="btn btn-sm btn-primary" href="{{route('admin.cubes.edit', ['cube' => $cube->id])}}">Edit</a></td>
                <td><a class="btn btn-sm btn-danger" href="{{route('admin.cubes.delete', ['cube' => $cube->id])}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/tables/cubes.table.js')}}"></script>
<script src="{{asset('js/image.js')}}"></script>
@endsection
