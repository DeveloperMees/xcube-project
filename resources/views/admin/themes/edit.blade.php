@extends('layout')
@section('content')
<h1 class="m-5 text-center">Edit theme</h1>
<div class="container">
    <nav class="mb-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.themes.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.themes.edit', ['theme' => $theme->id])}}">Edit</a>
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
    <form method="POST" action="{{route('admin.themes.update', ['theme' => $theme->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="themeName">Theme name</label>
            <input type="text" name="name" class="form-control" value="{{$theme->name}}" id="themeName">
        </div>
        <button type="submit" class="btn btn-primary">Edit Theme</button>
    </form>
</div>
@endsection