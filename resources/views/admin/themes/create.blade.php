@extends('layout')
@section('content')
<h1 class="m-5 text-center">Create theme</h1>
<div class="container">
    <nav class="mb-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.themes.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.themes.create')}}">Create</a>
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
    <form method="POST" action="{{route('admin.themes.store')}}">
        @csrf
        <div class="form-group">
            <label for="categoryName">Theme name</label>
            <input type="text" name="name" class="form-control" id="categoryName" placeholder="Enter name">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection