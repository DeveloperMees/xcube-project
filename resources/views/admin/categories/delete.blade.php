@extends('layout')
@section('content')
<h1 class="m-5 text-center">Delete category</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.categories.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.categories.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <form method="POST" action="{{route('admin.categories.update', ['category' => $category->id])}}">
        @method('delete')
        @csrf
        <div class="form-group">
            <label for="categoryName">Category name</label>
            <input type="text" name="name" class="form-control" id="categoryName" value="{{$category->name}}" placeholder="Enter name" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Delete category</button>
    </form>
</div>
@endsection