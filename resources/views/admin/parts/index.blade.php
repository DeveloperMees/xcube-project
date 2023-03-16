@extends('layout')
@section('content')
<h1 class="m-5 text-center">Parts index</h1>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Parts</li>
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
                <a class="nav-link active" href="{{route('admin.parts.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.parts.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <table class="table table-striped text-center" id="PartsTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Preview</th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Measurement</th>
                <th scope="col">Weight</th>
                <th scope="col">Category</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parts as $part)
            <tr>
                <td><img class="table_img" src="{{asset('storage/'.$part->file_path)}}"></td>
                <th scope="row">{{$part->id}}</th>
                <td>{{$part->name}}</td>
                <td>{{$part->measurement}}</td>
                <td>{{$part->weight}}</td>
                <td>{{$part->category->name}}</td>
                <td><a class="btn btn-sm btn-primary" href="{{route('admin.parts.edit', ['part' => $part->id])}}">Edit</a></td>
                <td><a class="btn btn-sm btn-danger" href="{{route('admin.parts.delete', ['part' => $part->id])}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/tables/parts.table.js')}}"></script>
<script src="{{asset('js/image.js')}}"></script>
@endsection