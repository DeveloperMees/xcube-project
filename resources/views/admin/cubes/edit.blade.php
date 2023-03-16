@extends('layout')
@section('content')
<h1 class="m-5 text-center">Update cube</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.cubes.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.cubes.edit', ['cube' => $cube->id])}}">Edit</a>
            </li>
        </ul>
    </nav>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{route('admin.cubes.update', ['cube' => $cube->id])}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="cubeName">Cube name</label>
            <input type="text" name="name" class="form-control" id="cubeName" value="{{$cube->name}}" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="cubeName3">Theme</label>
            <select name="theme_id" class="custom-select" id="inputGroupSelect01">
                <option value="" selected>Choose...</option>
                @foreach($themes as $theme)
                <option value="{{$theme->id}}">{{$theme->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <img class="table_img" src="{{asset('storage/'.$cube->file_path)}}" alt="">
            <br>
            <label for="categoryName3">Insert a part image</label><br>
            <input type="file" name="file">
            <br>
            <input class="mt-2" type="checkbox" id="removeImage" name="remove_img">
            <label for="removeImage">Remove image</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection