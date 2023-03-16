@extends('layout')
@section('content')
<h1 class="m-5 text-center">Delete category</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.cubes.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.cubes.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <form method="POST" action="{{route('admin.cubes.update', ['cube' => $cube->id])}}">
        @method('delete')
        @csrf
        <div class="form-group">
            <label for="cubeName">Cube name</label>
            <input type="text" name="name" class="form-control" id="cubeName" value="{{$cube->name}}" placeholder="Enter name" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Delete cube</button>
    </form>
</div>
@endsection