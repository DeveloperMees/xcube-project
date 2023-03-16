@extends('layout')
@section('content')
<h1 class="m-5 text-center">Create cube</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.cubes.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.cubes.create')}}">Create</a>
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
    <form method="POST" action="{{route('admin.cubes.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="cubeName">Cube name</label>
            <input type="text" name="name" class="form-control" id="cubeName" placeholder="Enter name">
            <div class="form-group">
                <label for="cubeName3">Theme</label>
                <select name="theme_id" class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Choose...</option>
                    @foreach($themes as $theme)
                    <option value="{{$theme->id}}">{{$theme->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="categoryName3">Insert a cube image</label><br>
            <input type="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection