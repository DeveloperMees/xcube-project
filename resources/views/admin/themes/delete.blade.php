@extends('layout')
@section('content')
<h1 class="m-5 text-center">Delete part</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.themes.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.themes.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <form method="POST" action="{{route('admin.themes.update', ['theme' => $theme->id])}}">
        @method('delete')
        @csrf
        <div class="form-group">
            <label for="themeName">Theme name</label>
            <input type="text" name="name" class="form-control" id="themeName" value="{{$theme->name}}" placeholder="Enter name" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Delete theme</button>
    </form>
</div>
@endsection