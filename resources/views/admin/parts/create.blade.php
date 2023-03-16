@extends('layout')
@section('content')
<h1 class="m-5 text-center">Create part</h1>
<div class="container">
    <nav class="mb-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.parts.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.parts.create')}}">Create</a>
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
    <form method="POST" action="{{route('admin.parts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="categoryName">Parts name</label>
            <input type="text" name="name" class="form-control" id="categoryName" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="categoryName1">Measurement</label>
            <input type="text" name="measurement" class="form-control" id="categoryName1" placeholder="Enter measurments">
        </div>
        <div class="form-group">
            <label for="categoryName2">Weight</label>
            <input type="text" name="weight" class="form-control" id="categoryName2" placeholder="Enter weight">
        </div>
        <div class="form-group">
            <label for="categoryName3">Category Name</label>
            <select name="category_id" class="custom-select" id="inputGroupSelect01">
                <option value="" selected>Choose...</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="categoryName3">Insert a part image</label><br>
            <input type="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection