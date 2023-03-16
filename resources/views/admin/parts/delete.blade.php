@extends('layout')
@section('content')
<h1 class="m-5 text-center">Delete part</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.parts.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.parts.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <form method="POST" action="{{route('admin.parts.update', ['part' => $part->id])}}">
        @method('delete')
        @csrf
        <div class="form-group">
            <label for="partName">Part name</label>
            <input type="text" name="name" class="form-control" id="partName" value="{{$part->name}}" placeholder="Enter name" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Delete part</button>
    </form>
</div>
@endsection